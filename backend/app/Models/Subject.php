<?php

namespace App\Models;

/**
 * Class Subject - Đại diện cho một môn học
 * Sử dụng OOP để quản lý thông tin môn học
 */
class Subject
{
    private string $field;      // Tên field trong database (vd: 'toan')
    private string $name;       // Tên hiển thị (vd: 'Toán')
    private float $gioiMin;     // Điểm tối thiểu để đạt loại Giỏi
    private float $khaMin;      // Điểm tối thiểu để đạt loại Khá
    private float $trungBinhMin; // Điểm tối thiểu để đạt loại Trung bình

    /**
     * Constructor
     */
    public function __construct(
        string $field,
        string $name,
        float $gioiMin = 8.0,
        float $khaMin = 6.5,
        float $trungBinhMin = 5.0
    ) {
        $this->field = $field;
        $this->name = $name;
        $this->gioiMin = $gioiMin;
        $this->khaMin = $khaMin;
        $this->trungBinhMin = $trungBinhMin;
    }

    /**
     * Lấy tên field trong database
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * Lấy tên hiển thị
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Phân loại điểm theo 4 mức
     * @param float|null $score Điểm số
     * @return string 'gioi'|'kha'|'trung_binh'|'yeu'|null
     */
    public function classifyScore(?float $score): ?string
    {
        if ($score === null) {
            return null;
        }

        if ($score >= $this->gioiMin) {
            return 'gioi';
        } elseif ($score >= $this->khaMin) {
            return 'kha';
        } elseif ($score >= $this->trungBinhMin) {
            return 'trung_binh';
        } else {
            return 'yeu';
        }
    }

    /**
     * Kiểm tra điểm có đạt loại Giỏi không
     */
    public function isGioi(?float $score): bool
    {
        return $score !== null && $score >= $this->gioiMin;
    }

    /**
     * Kiểm tra điểm có đạt loại Khá không
     */
    public function isKha(?float $score): bool
    {
        return $score !== null && $score >= $this->khaMin && $score < $this->gioiMin;
    }

    /**
     * Kiểm tra điểm có đạt loại Trung bình không
     */
    public function isTrungBinh(?float $score): bool
    {
        return $score !== null && $score >= $this->trungBinhMin && $score < $this->khaMin;
    }

    /**
     * Kiểm tra điểm có ở mức Yếu không
     */
    public function isYeu(?float $score): bool
    {
        return $score !== null && $score < $this->trungBinhMin;
    }

    /**
     * Lấy mảng thông tin môn học
     */
    public function toArray(): array
    {
        return [
            'field' => $this->field,
            'name' => $this->name,
            'gioi_min' => $this->gioiMin,
            'kha_min' => $this->khaMin,
            'trung_binh_min' => $this->trungBinhMin,
        ];
    }
}

