<?php

namespace App\Services;

use App\Models\Subject;

/**
 * Class SubjectManager - Quản lý danh sách môn học
 * Sử dụng Singleton pattern để đảm bảo chỉ có một instance
 */
class SubjectManager
{
    private static ?SubjectManager $instance = null;
    private array $subjects = [];

    /**
     * Private constructor để ngăn tạo instance từ bên ngoài
     */
    private function __construct()
    {
        $this->initializeSubjects();
    }

    /**
     * Lấy instance duy nhất của SubjectManager (Singleton)
     */
    public static function getInstance(): SubjectManager
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Khởi tạo danh sách môn học
     */
    private function initializeSubjects(): void
    {
        $this->subjects = [
            'toan' => new Subject('toan', 'Toán'),
            'ngu_van' => new Subject('ngu_van', 'Ngữ văn'),
            'ngoai_ngu' => new Subject('ngoai_ngu', 'Ngoại ngữ'),
            'vat_li' => new Subject('vat_li', 'Vật lý'),
            'hoa_hoc' => new Subject('hoa_hoc', 'Hóa học'),
            'sinh_hoc' => new Subject('sinh_hoc', 'Sinh học'),
            'lich_su' => new Subject('lich_su', 'Lịch sử'),
            'dia_li' => new Subject('dia_li', 'Địa lý'),
            'gdcd' => new Subject('gdcd', 'GDCD'),
        ];
    }

    /**
     * Lấy tất cả môn học
     * @return Subject[]
     */
    public function getAll(): array
    {
        return $this->subjects;
    }

    /**
     * Lấy môn học theo field
     */
    public function getByField(string $field): ?Subject
    {
        return $this->subjects[$field] ?? null;
    }

    /**
     * Lấy danh sách field của tất cả môn học
     * @return string[]
     */
    public function getFields(): array
    {
        return array_keys($this->subjects);
    }

    /**
     * Lấy mảng field => name
     */
    public function getFieldNameMap(): array
    {
        $map = [];
        foreach ($this->subjects as $field => $subject) {
            $map[$field] = $subject->getName();
        }
        return $map;
    }

    /**
     * Lấy danh sách môn học khối A (Toán, Vật lý, Hóa học)
     * @return Subject[]
     */
    public function getKhoiA(): array
    {
        return [
            $this->subjects['toan'],
            $this->subjects['vat_li'],
            $this->subjects['hoa_hoc'],
        ];
    }

    /**
     * Lấy danh sách field của khối A
     * @return string[]
     */
    public function getKhoiAFields(): array
    {
        return ['toan', 'vat_li', 'hoa_hoc'];
    }

    /**
     * Kiểm tra field có phải là môn học hợp lệ không
     */
    public function isValidField(string $field): bool
    {
        return isset($this->subjects[$field]);
    }

    /**
     * Lấy số lượng môn học
     */
    public function count(): int
    {
        return count($this->subjects);
    }
}

