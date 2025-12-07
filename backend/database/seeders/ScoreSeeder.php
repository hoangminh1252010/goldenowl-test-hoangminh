<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Score;
use App\Services\SubjectManager;

/**
 * Class ScoreSeeder - Seeder để import dữ liệu điểm thi từ CSV
 * Sử dụng OOP với SubjectManager để quản lý môn học
 */
class ScoreSeeder extends Seeder
{
    private SubjectManager $subjectManager;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subjectManager = SubjectManager::getInstance();
    }

    public function run(): void
    {
        $path = storage_path('app/data/diem_thi_thpt_2024.csv');

        if (!file_exists($path)) {
            dd("CSV file not found at: " . $path);
        }

        $file = fopen($path, 'r');

        // Bỏ dòng tiêu đề
        fgetcsv($file);

        while (($data = fgetcsv($file)) !== false) {
            // Sử dụng SubjectManager để lấy danh sách field
            $scoreData = [
                'sbd' => $data[0] ?? null,
            ];

            // Duyệt qua tất cả môn học và gán điểm
            $fields = $this->subjectManager->getFields();
            foreach ($fields as $index => $field) {
                $csvIndex = $index + 1; // CSV bắt đầu từ index 1 (index 0 là SBD)
                $scoreData[$field] = $this->convertToFloat($data[$csvIndex] ?? '');
            }

            // Thêm mã ngoại ngữ (cột cuối cùng trong CSV)
            $scoreData['ma_ngoai_ngu'] = ($data[10] ?? '') !== '' ? $data[10] : null;

            Score::create($scoreData);
        }

        fclose($file);
    }

    /**
     * Chuyển đổi chuỗi rỗng thành null hoặc float
     * @param string $value
     * @return float|null
     */
    private function convertToFloat(string $value): ?float
    {
        $value = trim($value);
        return ($value === '' || $value === null) ? null : (float) $value;
    }
}
