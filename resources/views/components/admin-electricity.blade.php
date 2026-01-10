@props(['transactionID', 'kwh', 'dueDate', 'datePaid', 'amount','unit', 'building', 'floor', 'status'])

@php
    // Extract Year and Month from dueDate if it exists
    $year = $dueDate ? date('Y', strtotime($dueDate)) : '';
    $month = $dueDate ? date('m', strtotime($dueDate)) : '';
    // Lowercase status for easier comparison (paid, pending, overdue)
    $cleanStatus = strtolower($status);
@endphp

<tr class="hover:bg-gray-100 transaction-row"
    data-year="{{ $year }}"
    data-month="{{ $month }}"
    data-status="{{ $cleanStatus }}"
    data-building="{{ $building ?? '01' }}"
    data-floor="{{ $floor ?? '01' }}"
    data-unit="{{ $unit }}">
    
    <td class="table-rows">{{ $transactionID }}</td>
    <td class="table-rows">{{ $kwh }}</td>
    <td class="table-rows">{{ $dueDate ?? '--' }}</td>
    <td class="table-rows">{{ $datePaid ?? '--' }}</td>
    <td class="table-rows">{{ $amount }}</td>
    <td class="table-rows">{{ $unit }}</td>


    <td class="table-rows">
        <button class="{{ $cleanStatus }}" disabled>
            {{ $status }}
        </button>
    </td>

</tr>