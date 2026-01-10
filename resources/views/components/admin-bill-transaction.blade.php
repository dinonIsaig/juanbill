@props(['bill'])

@php
    // 1. Extract values from the passed $bill object
    $transactionID = $bill->id ?? 'TXN-000';
    
    if ($bill->type === 'Electricity') {
        $consumption = $bill->consumption . ' kWh';
    } else {
        $consumption = $bill->consumption . ' cu. m';
    }
    
    // Formatting Dates
    $dueDate = $bill->due_date ? \Carbon\Carbon::parse($bill->due_date)->format('Y-m-d') : '--';
    $datePaid = $bill->date_paid ? \Carbon\Carbon::parse($bill->date_paid)->format('Y-m-d') : '--';
    
    $amount = '₱' . number_format($bill->amount, 2);
    $unitNumber = $bill->unit ?? '--';

    // 3. Map Database Status
    $status = $bill->status;

    // 4. Data attributes for filtering (Building/Floor/Unit)
    // 3210 format
    $building = substr($unitNumber, 0, 1);
    $floor = substr($unitNumber, 1, 1);
    
    // Date parts for year/month filtering
    $year = $bill->due_date ? \Carbon\Carbon::parse($bill->due_date)->format('Y') : '';
    $month = $bill->due_date ? \Carbon\Carbon::parse($bill->due_date)->format('m') : '';

@endphp

<tr class="hover:bg-gray-100 transaction-row" 
    data-year="{{ $year }}" 
    data-month="{{ $month }}"
    data-building="{{ $building }}"
    data-floor="{{ $floor }}"
    data-unit="{{ $unitNumber }}"
    data-status="{{ $status }}">

    <td class="table-rows">{{ $transactionID }}</td>
    @if ($bill->type === 'Electricity' || $bill->type === 'Water')
        <td class="table-rows">{{ $consumption }}</td>
    @endif
    <td class="table-rows text-gray-600">{{ $dueDate }}</td>
    <td class="table-rows">{{ $datePaid }}</td>
    <td class="table-rows font-bold">{{ $amount }}</td>
    <td class="table-rows">{{ $unitNumber }}</td>


    <td class="table-rows">
        @if($status === 'Paid')
            <span class="paid inline-block">Paid</span>
        @elseif($status === 'Unpaid' || $status === 'Pending')
            <span class="pending inline-block">Unpaid</span>
        @elseif($status === 'Overdue')
            <span class="overdue inline-block">Overdue</span>
        @else
            <span class="px-2 py-1 bg-gray-100 rounded-lg font-medium text-gray-600">{{ $status }}</span>
        @endif
    </td>
</tr>