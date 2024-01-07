<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionXRepository;
use App\Repositories\TransactionYRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public TransactionXRepository  $transactionsXRepository;
    public TransactionYRepository  $transactionsYRepository;

    public function __construct(TransactionXRepository $transactionsXRepository, TransactionYRepository $transactionsYRepository)
    {
        $this->transactionsXRepository = $transactionsXRepository;
        $this->transactionsYRepository = $transactionsYRepository;
    }

    public function index(Request $request)
    {
        $transactionsX = in_array($request->get('provider'), ['DataProviderX', null]) ?  $this->transactionsXRepository->indexList($request->all()) : collect([]);
        $transactionsY = in_array($request->get('provider'), ['DataProviderY', null]) ?  $this->transactionsYRepository->indexList($request->all()) : collect([]);

        return $transactionsX->concat($transactionsY);
    }
}
