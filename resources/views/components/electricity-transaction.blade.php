@props(['bill'])

@php
    // 1. Extract values from the passed $bill object
    $transactionID = $bill->id; // Or Str::limit($bill->id, 8)
    $kwh = $bill->consumption . ' kWh';
    $datePaid = $bill->date_paid ? $bill->date_paid->format('Y-m-d') : '--';
    $amount = '₱' . number_format($bill->amount, 2);

    // 2. Map Database Status
    $status = $bill->status;

    // 3. Data attributes for filtering
    $year = $bill->date_paid ? $bill->date_paid->format('Y') : '';
    $month = $bill->date_paid ? $bill->date_paid->format('m') : '';

@endphp

<tr class="hover:bg-gray-100 transaction-row"
    data-year="{{ $year }}"
    data-month="{{ $month }}"
    data-status="{{ $status }}">

    <td class="table-rows">{{ $transactionID }}</td>
    <td class="table-rows">{{ $kwh }}</td>
    <td class="table-rows">{{ $datePaid }}</td>
    <td class="table-rows">{{ $amount }}</td>

    <td class="table-rows">

        @if ($status === 'Paid')
            <button class="paid" disabled>Paid</button>
        @elseif ($status === 'Unpaid')
            <button class="pending" disabled>Unpaid</button>
        @else
            <button class="overdue" disabled>{{ $Status }}</button>

        @endif
    </td>

    <td class="table-rows">

        @if ($status === 'Unpaid' || $status === 'Overdue')
            <button onclick="document.getElementById('paymentModal').classList.remove('hidden')"
                class="payment-btn rounded-2 bg-primary text-white hover:bg-white hover:text-primary hover:ring-1">
                Pay
            </button>
        @endif
    </td>
</tr>

<x-payment-modal id="paymentModal" />

