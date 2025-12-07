<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu điểm thi THPT 2024</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }
        .wrapper {
            max-width: 500px;
            width: 100%;
        }

        .btn-back {
            display: block;
            width: 40%;
            padding: 12px 24px;
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .btn-back:hover {
            background: #f0f0f0;
        }
        .error {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }

        .help-text {
            margin-top: 10px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }

        
        /* Tablet styles */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
                border-radius: 15px;
            }

            h1 {
                font-size: 24px;
            }

            .subtitle {
                font-size: 13px;
            }
        }

        /* Mobile styles */
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 25px 20px;
                border-radius: 15px;
            }

            h1 {
                font-size: 22px;
                margin-bottom: 8px;
            }

            .subtitle {
                font-size: 12px;
                margin-bottom: 25px;
            }

            input[type="text"] {
                padding: 14px 15px;
                font-size: 16px; /* Prevent zoom on iOS */
            }

            .btn {
                padding: 16px;
                font-size: 16px;
            }

            .error {
                padding: 10px;
                font-size: 13px;
            }

            .help-text {
                font-size: 11px;
            }
        }

        /* Small mobile */
        @media (max-width: 360px) {
            h1 {
                font-size: 20px;
            }

            .container {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
<div class="wrapper">
<a href="{{ route('dashboard') }}" class="btn-back">← Về trang chủ</a>
    <div class="container">
        <h1>🎓 Tra cứu điểm thi</h1>
        <p class="subtitle">Kỳ thi THPT Quốc gia 2024</p>

        @if(isset($error))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('scores.search.post') }}">
            @csrf
            
            <div class="form-group">
                <label for="sbd">Số báo danh (SBD)</label>
                <input 
                    type="text" 
                    id="sbd" 
                    name="sbd" 
                    value="{{ old('sbd', $sbd ?? '') }}"
                    placeholder="Nhập số báo danh (VD: 01000001)"
                    required
                    autofocus
                    inputmode="numeric"
                >
                @error('sbd')
                    <div style="color: #c33; font-size: 12px; margin-top: 5px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn">
                🔍 Tra cứu điểm
            </button>
        </form>

        <p class="help-text">
            Vui lòng nhập đúng số báo danh để tra cứu điểm thi
        </p>
    </div>
    </div>
</body>
</html>