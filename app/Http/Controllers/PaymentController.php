<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,paid,overdue',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        $payment->student->updateFinancialStatus();

        return redirect()->route('payments.index')->with('success', 'Pagamento atualizado com sucesso.');
    }
}
