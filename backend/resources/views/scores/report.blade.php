<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo Phân loại Điểm thi</title>
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
            max-width: 1400px;
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
            margin-bottom: 20px;
        }

        .legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .legend-item.gioi {
            background: #4caf50;
            color: white;
        }

        .legend-item.kha {
            background: #2196f3;
            color: white;
        }

        .legend-item.trung-binh {
            background: #ff9800;
            color: white;
        }

        .legend-item.yeu {
            background: #f44336;
            color: white;
        }

        .report-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .subject-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            border-left: 4px solid #667eea;
        }

        .subject-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }

        .stats-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .stats-row:last-child {
            border-bottom: none;
        }

        .stats-label {
            font-size: 14px;
            color: #666;
        }

        .stats-value {
            font-size: 16px;
            font-weight: 700;
        }

        .stats-value.gioi {
            color: #4caf50;
        }

        .stats-value.kha {
            color: #2196f3;
        }

        .stats-value.trung-binh {
            color: #ff9800;
        }

        .stats-value.yeu {
            color: #f44336;
        }

        .total-row {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #667eea;
            font-weight: 700;
            color: #333;
        }

        @media (max-width: 768px) {
            .report-grid {
                grid-template-columns: 1fr;
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
            <h1>📊 Báo cáo Phân loại Điểm thi</h1>
            <p>Kỳ thi THPT Quốc gia 2024</p>
        </div>

        <a href="{{ route('dashboard') }}" class="btn-back">← Về trang chủ</a>

        <div class="card">
            <div class="legend">
                <div class="legend-item gioi">
                    <span>Giỏi (≥ 8.0)</span>
                </div>
                <div class="legend-item kha">
                    <span>Khá (6.5 - 7.9)</span>
                </div>
                <div class="legend-item trung-binh">
                    <span>Trung bình (5.0 - 6.4)</span>
                </div>
                <div class="legend-item yeu">
                    <span>Yếu (< 5.0)</span>
                </div>
            </div>

            <div class="report-grid">
                @foreach($report as $field => $data)
                <div class="subject-card">
                    <div class="subject-title">{{ $data['name'] }}</div>
                    
                    <div class="stats-row">
                        <span class="stats-label">Giỏi:</span>
                        <span class="stats-value gioi">{{ number_format($data['gioi']) }}</span>
                    </div>
                    
                    <div class="stats-row">
                        <span class="stats-label">Khá:</span>
                        <span class="stats-value kha">{{ number_format($data['kha']) }}</span>
                    </div>
                    
                    <div class="stats-row">
                        <span class="stats-label">Trung bình:</span>
                        <span class="stats-value trung-binh">{{ number_format($data['trung_binh']) }}</span>
                    </div>
                    
                    <div class="stats-row">
                        <span class="stats-label">Yếu:</span>
                        <span class="stats-value yeu">{{ number_format($data['yeu']) }}</span>
                    </div>
                    
                    <div class="stats-row total-row">
                        <span>Tổng số thí sinh:</span>
                        <span>{{ number_format($data['total']) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>