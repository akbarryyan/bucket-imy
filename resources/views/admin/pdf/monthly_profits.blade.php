<!DOCTYPE html>
<html>
<head>
    <title>Monthly Profits Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Monthly Profits Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Month</th>
                <th>Total Profit</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($monthlyProfits as $monthlyProfit)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $monthlyProfit->month }}</td>
                <td>Rp. {{ number_format($monthlyProfit->total_profit, 2) }}</td>
            </tr>
            @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
