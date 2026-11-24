<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::where('stock', '>', 0)->get();

        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock < $request->quantity) {
            return back()
                ->withErrors(['quantity' => 'Stok buku tidak mencukupi.'])
                ->withInput();
        }

        DB::transaction(function () use ($request, $book) {
            $borrowing = Borrowing::create([
                'user_id' => auth()->id(),
                'member_id' => $request->member_id,
                'borrowing_date' => now()->toDateString(),
                'due_date' => now()->addDays(7)->toDateString(),
                'status' => 'borrowed',
            ]);

            $borrowing->details()->create([
                'book_id' => $book->id,
                'quantity' => $request->quantity,
            ]);

            $book->decrement('stock', $request->quantity);
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil disimpan.');
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::with('details.book')->findOrFail($id);

        if ($borrowing->status !== 'borrowed') {
            return back()->with('error', 'Transaksi sudah dikembalikan.');
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'return_date' => now()->toDateString(),
                'status' => 'returned',
            ]);

            foreach ($borrowing->details as $detail) {
                $detail->book->increment('stock', $detail->quantity);
            }
        });

        return back()->with('success', 'Buku berhasil dikembalikan.');
    }
}
