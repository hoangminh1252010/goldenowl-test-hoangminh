<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Quản lý Điểm thi THPT 2024</title>
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
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .header p {
            font-size: 18px;
            opacity: 0.95;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 15px;
            text-align: center;
        }

        .feature-title {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }

        .feature-description {
            font-size: 14px;
            color: #666;
            text-align: center;
            line-height: 1.6;
        }

        .feature-card:nth-child(1) {
            border-top: 4px solid #667eea;
        }

        .feature-card:nth-child(2) {
            border-top: 4px solid #f093fb;
        }

        .feature-card:nth-child(3) {
            border-top: 4px solid #4facfe;
        }

        .feature-card:nth-child(4) {
            border-top: 4px solid #43e97b;
        }

        /* Tablet styles */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 28px;
            }

            .header p {
                font-size: 16px;
            }

            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }

            .feature-card {
                padding: 25px;
            }

            .feature-title {
                font-size: 20px;
            }
        }

        /* Mobile styles */
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .header {
                margin-bottom: 30px;
            }

            .header h1 {
                font-size: 24px;
            }

            .header p {
                font-size: 14px;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .feature-card {
                padding: 20px;
            }

            .feature-icon {
                font-size: 40px;
            }

            .feature-title {
                font-size: 18px;
            }

            .feature-description {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 Hệ thống Quản lý Điểm thi</h1>
            <p>Kỳ thi THPT Quốc gia 2024</p>
        </div>

        <div class="features-grid">
            <a href="{{ route('scores.search') }}" class="feature-card">
                <div class="feature-icon">🔍</div>
                <div class="feature-title">Tra cứu điểm thi</div>
                <div class="feature-description">
                    Tra cứu điểm thi theo số báo danh (SBD). Xem điểm chi tiết từng môn và tổng kết.
                </div>
            </a>

            <a href="{{ route('scores.report') }}" class="feature-card">
                <div class="feature-icon">📊</div>
                <div class="feature-title">Báo cáo phân loại</div>
                <div class="feature-description">
                    Báo cáo phân loại điểm theo 4 mức: Giỏi, Khá, Trung bình, Yếu theo từng môn học.
                </div>
            </a>

            <a href="{{ route('scores.statistics') }}" class="feature-card">
                <div class="feature-icon">📈</div>
                <div class="feature-title">Thống kê biểu đồ</div>
                <div class="feature-description">
                    Thống kê số lượng thí sinh trong 4 mức điểm theo từng môn học bằng biểu đồ trực quan.
                </div>
            </a>

            <a href="{{ route('scores.top10-khoi-a') }}" class="feature-card">
                <div class="feature-icon">🏆</div>
                <div class="feature-title">Top 10 Khối A</div>
                <div class="feature-description">
                    Liệt kê Top 10 thí sinh khối A (Toán, Vật lý, Hóa học) có tổng điểm cao nhất.
                </div>
            </a>
        </div>
    </div>
</body>
</html>