<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Thí sinh Khối A</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 24px;
            background: white;
            color: #667eea;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .btn-back:hover {
            background: #f0f0f0;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .rank {
            font-weight: 700;
            font-size: 18px;
            color: #667eea;
            text-align: center;
            width: 60px;
        }

        .rank.gold {
            color: #ffd700;
        }

        .rank.silver {
            color: #c0c0c0;
        }

        .rank.bronze {
            color: #cd7f32;
        }

        .score {
            font-weight: 700;
            color: #333;
        }

        .total-score {
            font-weight: 700;
            font-size: 18px;
            color: #667eea;
        }

        @media (max-width: 768px) {
            .card {
                padding: 20px;
            }

            th, td {
                padding: 10px;
                font-size: 14px;
            }

            .rank {
                font-size: 16px;
            }

            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏆 Top 10 Thí sinh Khối A</h1>
            <p>Toán - Vật lý - Hóa học</p>
        </div>

        <a href="{{ route('dashboard') }}" class="btn-back">← Về trang chủ</a>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Hạng</th>
                        <th>Số báo danh</th>
                        <th>Toán</th>
                        <th>Vật lý</th>
                        <th>Hóa học</th>
                        <th>Tổng điểm</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($top10 as $index => $score)
                    <tr>
                        <td class="rank {{ $index === 0 ? 'gold' : ($index === 1 ? 'silver' : ($index === 2 ? 'bronze' : '')) }}">
                            {{ $index + 1 }}
                        </td>
                        <td>{{ $score->sbd }}</td>
                        <td class="score">{{ number_format($score->toan, 2) }}</td>
                        <td class="score">{{ number_format($score->vat_li, 2) }}</td>
                        <td class="score">{{ number_format($score->hoa_hoc, 2) }}</td>
                        <td class="total-score">{{ number_format($score->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>