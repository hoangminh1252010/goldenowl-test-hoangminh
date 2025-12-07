<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê Biểu đồ Điểm thi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .chart-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
        }

        .chart-container {
            position: relative;
            height: 300px;
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
        }

        .chart-title {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .chart-grid {
                grid-template-columns: 1fr;
            }

            .chart-container {
                height: 250px;
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
            <h1>📈 Thống kê Biểu đồ Điểm thi</h1>
            <p>Kỳ thi THPT Quốc gia 2024</p>
        </div>

        <a href="{{ route('dashboard') }}" class="btn-back">← Về trang chủ</a>

        <div class="card">
            <div class="chart-grid">
                @foreach($statistics as $field => $data)
                <div>
                    <div class="chart-title">{{ $data['name'] }}</div>
                    <div class="chart-container">
                        <canvas id="chart-{{ $field }}"></canvas>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const statistics = @json($statistics);
        
        Object.keys(statistics).forEach(field => {
            const data = statistics[field];
            const ctx = document.getElementById('chart-' + field).getContext('2d');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Giỏi (≥8.0)', 'Khá (6.5-7.9)', 'Trung bình (5.0-6.4)', 'Yếu (<5.0)'],
                    datasets: [{
                        label: 'Số lượng thí sinh',
                        data: [
                            data.gioi,
                            data.kha,
                            data.trung_binh,
                            data.yeu
                        ],
                        backgroundColor: [
                            '#4caf50',
                            '#2196f3',
                            '#ff9800',
                            '#f44336'
                        ],
                        borderColor: [
                            '#388e3c',
                            '#1976d2',
                            '#f57c00',
                            '#d32f2f'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html> 