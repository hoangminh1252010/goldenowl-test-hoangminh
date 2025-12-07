<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tra cứu điểm thi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
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

        .header p {
            font-size: 16px;
            opacity: 0.95;
        }

        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 30px;
            margin-bottom: 20px;
        }

        .sbd-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 25px;
        }

        .sbd-info h2 {
            font-size: 24px;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .sbd-info p {
            opacity: 0.9;
            font-size: 14px;
        }

        .scores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .score-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .score-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .score-item .subject {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .score-item .score {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
        }

        .score-item .score.null {
            color: #999;
            font-size: 16px;
        }

        .total-score {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }

        .total-score h3 {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 600;
        }

        .total-score .numbers {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
        }

        .total-score .number-item {
            text-align: center;
        }

        .total-score .number-item .label {
            font-size: 12px;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .total-score .number-item .value {
            font-size: 24px;
            font-weight: bold;
        }

        .btn-back {
            display: block;
            width: 50%;
            margin-left:25%;    
            padding-top: 20px;
            padding: 14px;
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .btn-back:hover {
            background: #667eea;
            color: white;
        }

        .subject-names {
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        /* Tablet styles */
        @media (max-width: 768px) {
            .container {
                padding: 0;
            }

            .header h1 {
                font-size: 26px;
            }

            .header p {
                font-size: 14px;
            }

            .card {
                padding: 25px;
                border-radius: 15px;
            }

            .sbd-info {
                padding: 18px;
            }

            .sbd-info h2 {
                font-size: 20px;
            }

            .scores-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 12px;
            }

            .score-item {
                padding: 12px;
            }

            .score-item .score {
                font-size: 22px;
            }

            .total-score .numbers {
                flex-direction: column;
                gap: 15px;
            }

            .total-score .number-item {
                padding: 10px 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }

            .total-score .number-item:last-child {
                border-bottom: none;
            }
        }

        /* Mobile styles */
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .header {
                margin-bottom: 20px;
            }

            .header h1 {
                font-size: 22px;
                margin-bottom: 8px;
            }

            .header p {
                font-size: 13px;
            }

            .card {
                padding: 20px 15px;
                border-radius: 15px;
            }

            .sbd-info {
                padding: 15px;
                margin-bottom: 20px;
            }

            .sbd-info h2 {
                font-size: 18px;
            }

            .sbd-info p {
                font-size: 12px;
            }

            .scores-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                margin-bottom: 20px;
            }

            .score-item {
                padding: 12px 10px;
            }

            .score-item .subject {
                font-size: 12px;
                margin-bottom: 4px;
            }

            .score-item .score {
                font-size: 20px;
            }

            .score-item .score.null {
                font-size: 14px;
            }

            .total-score {
                padding: 18px 15px;
            }

            .total-score h3 {
                font-size: 16px;
                margin-bottom: 12px;
            }

            .total-score .numbers {
                flex-direction: column;
                gap: 12px;
                margin-top: 12px;
            }

            .total-score .number-item {
                padding: 8px 0;
            }

            .total-score .number-item .label {
                font-size: 11px;
            }

            .total-score .number-item .value {
                font-size: 22px;
            }

            .btn-back {
                padding: 16px;
                font-size: 16px;
            }
        }

        /* Small mobile */
        @media (max-width: 360px) {
            .header h1 {
                font-size: 20px;
            }

            .scores-grid {
                grid-template-columns: 1fr;
            }

            .score-item .score {
                font-size: 18px;
            }
        }

        /* Landscape orientation on mobile */
        @media (max-width: 768px) and (orientation: landscape) {
            .header {
                margin-bottom: 15px;
            }

            .header h1 {
                font-size: 20px;
            }

            .scores-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 Kết quả tra cứu điểm thi</h1>
            <p>Kỳ thi THPT Quốc gia 2024</p>
        </div>

        <div class="card">
            <div class="sbd-info">
                <h2>Số báo danh: {{ $score->sbd }}</h2>
                @if($score->ma_ngoai_ngu)
                    <p>Mã ngoại ngữ: {{ $score->ma_ngoai_ngu }}</p>
                @endif
            </div>

            <div class="scores-grid">
                <div class="score-item">
                    <div class="subject subject-names">Toán</div>
                    <div class="score {{ $score->toan === null ? 'null' : '' }}">
                        {{ $score->toan !== null ? number_format($score->toan, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">Ngữ văn</div>
                    <div class="score {{ $score->ngu_van === null ? 'null' : '' }}">
                        {{ $score->ngu_van !== null ? number_format($score->ngu_van, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">Ngoại ngữ</div>
                    <div class="score {{ $score->ngoai_ngu === null ? 'null' : '' }}">
                        {{ $score->ngoai_ngu !== null ? number_format($score->ngoai_ngu, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">Vật lý</div>
                    <div class="score {{ $score->vat_li === null ? 'null' : '' }}">
                        {{ $score->vat_li !== null ? number_format($score->vat_li, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">Hóa học</div>
                    <div class="score {{ $score->hoa_hoc === null ? 'null' : '' }}">
                        {{ $score->hoa_hoc !== null ? number_format($score->hoa_hoc, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">Sinh học</div>
                    <div class="score {{ $score->sinh_hoc === null ? 'null' : '' }}">
                        {{ $score->sinh_hoc !== null ? number_format($score->sinh_hoc, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">Lịch sử</div>
                    <div class="score {{ $score->lich_su === null ? 'null' : '' }}">
                        {{ $score->lich_su !== null ? number_format($score->lich_su, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">Địa lý</div>
                    <div class="score {{ $score->dia_li === null ? 'null' : '' }}">
                        {{ $score->dia_li !== null ? number_format($score->dia_li, 2) : 'N/A' }}
                    </div>
                </div>

                <div class="score-item">
                    <div class="subject subject-names">GDCD</div>
                    <div class="score {{ $score->gdcd === null ? 'null' : '' }}">
                        {{ $score->gdcd !== null ? number_format($score->gdcd, 2) : 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="total-score">
                <h3>📊 Tổng kết</h3>
                <div class="numbers">
                    <div class="number-item">
                        <div class="label">Tổng điểm</div>
                        <div class="value">{{ number_format($totalScore['total'], 2) }}</div>
                    </div>
                    <div class="number-item">
                        <div class="label">Số môn</div>
                        <div class="value">{{ $totalScore['count'] }}</div>
                    </div>
                    <div class="number-item">
                        <div class="label">Điểm TB</div>
                        <div class="value">{{ number_format($totalScore['average'], 2) }}</div>
                    </div>
                </div>
            </div>

            <a href="{{ route('scores.search') }}" class="btn-back">
                ← Tra cứu lại
            </a>
        </div>
    </div>
</body>
</html>