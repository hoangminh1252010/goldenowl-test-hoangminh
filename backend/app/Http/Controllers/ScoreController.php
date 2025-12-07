<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Services\ScoreService;
use Illuminate\Http\Request;

/**
 * Class ScoreController - Controller xử lý các request liên quan đến điểm thi
 * Sử dụng OOP với ScoreService để tách biệt business logic
 */
class ScoreController extends Controller
{
    private ScoreService $scoreService;

    /**
     * Constructor - Dependency Injection
     */
    public function __construct(ScoreService $scoreService)
    {
        $this->scoreService = $scoreService;
    }

    /**
     * Hiển thị form tra cứu điểm thi
     */
    public function index()
    {
        return view('scores.search');
    }

    /**
     * Tra cứu điểm thi theo số báo danh
     */
    public function search(Request $request)
    {
        // Validate input
        $request->validate([
            'sbd' => 'required|string|max:20',
        ], [
            'sbd.required' => 'Vui lòng nhập số báo danh',
            'sbd.string' => 'Số báo danh không hợp lệ',
        ]);

        $sbd = $request->input('sbd');
        
        // Tìm kiếm điểm thi theo số báo danh
        $score = Score::where('sbd', $sbd)->first();

        if ($score) {
            // Sử dụng ScoreService để tính tổng điểm
            $totalScore = $this->scoreService->calculateTotalScore($score);
            
            return view('scores.result', [
                'score' => $score,
                'totalScore' => $totalScore,
            ]);
        } else {
            return view('scores.search', [
                'error' => 'Không tìm thấy điểm thi với số báo danh: ' . $sbd,
                'sbd' => $sbd,
            ]);
        }
    }

    /**
     * Báo cáo phân loại điểm theo 4 mức
     * Sử dụng ScoreService để lấy dữ liệu
     */
    public function report()
    {
        $report = $this->scoreService->getClassificationReport();
        return view('scores.report', ['report' => $report]);
    }

    /**
     * Thống kê số lượng thí sinh trong 4 mức điểm theo từng môn học (biểu đồ)
     * Sử dụng ScoreService để lấy dữ liệu
     */
    public function statistics()
    {
        $statistics = $this->scoreService->getStatistics();
        return view('scores.statistics', ['statistics' => $statistics]);
    }

    /**
     * Top 10 thí sinh khối A (Toán, Lý, Hóa)
     * Sử dụng ScoreService để lấy dữ liệu
     */
    public function top10KhoiA()
    {
        $top10 = $this->scoreService->getTopKhoiA(10);
        return view('scores.top10-khoi-a', ['top10' => $top10]);
    }
}