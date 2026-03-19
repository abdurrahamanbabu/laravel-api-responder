<?php
namespace AbdurRahaman\LaravelApiResponder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class ApiResponder {
    protected $status = 200;
    protected $meta = [];
    protected $message = null;

    public function success($data = null, $message = 'Success', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $this->message ?? $message,
            'data' => $data,
            'meta' => $this->meta ?: null,
            'errors' => null,
        ], $this->status ?? $code);
    }

    public function error($message = 'Error', $code = 400, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
            'meta' => null,
            'errors' => $errors,
        ], $code);
    }

    public function paginate(LengthAwarePaginator $paginator, $message = 'Data fetched successfully')
    {
        return response()->json([
            'success' => true,
            'message' => $this->message ?? $message,
            'data' => $paginator->items(),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ],
            'errors' => null,
        ], $this->status);
    }

    public function withMeta(array $meta)
    {
        $this->meta = $meta;
        return $this;
    }

    public function withMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }

    public function withStatus(int $status)
    {
        $this->status = $status;
        return $this;
    }
}