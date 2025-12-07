<?php

namespace App\Services;

use App\Models\Score;
use App\Models\Subject;
use App\Services\SubjectManager;

/**
 * Class ScoreService - Xử lý logic tính toán và thống kê điểm
 * Sử dụng OOP để tách biệt business logic
 */
class ScoreService
{
    private SubjectManager $subjectManager;

    public function __construct()
    {
        $this->subjectManager = SubjectManager::getInstance();
    }

    /**
     * Tính tổng điểm các môn
     */
    public function calculateTotalScore(Score $score): array
    {
        $total = 0;
        $count = 0;

        foreach ($this->subjectManager->getAll() as $subject) {
            $field = $subject->getField();
            $scoreValue = $score->$field;
            
            if ($scoreValue !== null) {
                $total += $scoreValue;
                $count++;
            }
        }

        return [
            'total' => $total,
            'count' => $count,
            'average' => $count > 0 ? round($total / $count, 2) : 0,
        ];
    }

    /**
     * Lấy báo cáo phân loại điểm theo 4 mức cho tất cả môn học
     */
    public function getClassificationReport(): array
    {
        $report = [];

        foreach ($this->subjectManager->getAll() as $subject) {
            $field = $subject->getField();
            
            $report[$field] = [
                'name' => $subject->getName(),
                'gioi' => Score::whereNotNull($field)
                    ->where($field, '>=', 8.0)
                    ->count(),
                'kha' => Score::whereNotNull($field)
                    ->whereBetween($field, [6.5, 7.99])
                    ->count(),
                'trung_binh' => Score::whereNotNull($field)
                    ->whereBetween($field, [5.0, 6.49])
                    ->count(),
                'yeu' => Score::whereNotNull($field)
                    ->where($field, '<', 5.0)
                    ->count(),
                'total' => Score::whereNotNull($field)->count(),
            ];
        }

        return $report;
    }

    /**
     * Lấy thống kê số lượng thí sinh theo 4 mức điểm (dùng cho biểu đồ)
     */
    public function getStatistics(): array
    {
        $statistics = [];

        foreach ($this->subjectManager->getAll() as $subject) {
            $field = $subject->getField();
            
            $statistics[$field] = [
                'name' => $subject->getName(),
                'gioi' => Score::whereNotNull($field)
                    ->where($field, '>=', 8.0)
                    ->count(),
                'kha' => Score::whereNotNull($field)
                    ->whereBetween($field, [6.5, 7.99])
                    ->count(),
                'trung_binh' => Score::whereNotNull($field)
                    ->whereBetween($field, [5.0, 6.49])
                    ->count(),
                'yeu' => Score::whereNotNull($field)
                    ->where($field, '<', 5.0)
                    ->count(),
            ];
        }

        return $statistics;
    }

    /**
     * Lấy Top N thí sinh khối A
     */
    public function getTopKhoiA(int $limit = 10)
    {
        $khoiAFields = $this->subjectManager->getKhoiAFields();
        
        $query = Score::whereNotNull('toan')
            ->whereNotNull('vat_li')
            ->whereNotNull('hoa_hoc')
            ->select('sbd', 'toan', 'vat_li', 'hoa_hoc')
            ->selectRaw('(toan + vat_li + hoa_hoc) as total')
            ->orderBy('total', 'desc')
            ->limit($limit);

        return $query->get();
    }

    /**
     * Phân loại điểm của một thí sinh theo môn học
     */
    public function classifyStudentScore(Score $score): array
    {
        $classification = [];

        foreach ($this->subjectManager->getAll() as $subject) {
            $field = $subject->getField();
            $scoreValue = $score->$field;
            
            $classification[$field] = [
                'name' => $subject->getName(),
                'score' => $scoreValue,
                'level' => $subject->classifyScore($scoreValue),
            ];
        }

        return $classification;
    }
}

