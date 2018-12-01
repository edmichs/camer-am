<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAffectionRequest;
use App\Http\Requests\UpdateAffectionRequest;
use App\Repositories\AffectionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AffectionController extends AppBaseController
{
    /** @var  AffectionRepository */
    private $affectionRepository;

    public function __construct(AffectionRepository $affectionRepo)
    {
        $this->affectionRepository = $affectionRepo;
    }

    /**
     * Display a listing of the Affection.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->affectionRepository->pushCriteria(new RequestCriteria($request));
        $affections = $this->affectionRepository->all();

        return view('affections.index')
            ->with('affections', $affections);
    }

    /**
     * Show the form for creating a new Affection.
     *
     * @return Response
     */
    public function create()
    {
        return view('affections.create');
    }

    /**
     * Store a newly created Affection in storage.
     *
     * @param CreateAffectionRequest $request
     *
     * @return Response
     */
    public function store(CreateAffectionRequest $request)
    {
        $input = $request->all();

        $affection = $this->affectionRepository->create($input);

        Flash::success('Affection saved successfully.');

        return redirect(route('affections.index'));
    }

    /**
     * Display the specified Affection.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $affection = $this->affectionRepository->findWithoutFail($id);

        if (empty($affection)) {
            Flash::error('Affection not found');

            return redirect(route('affections.index'));
        }

        return view('affections.show')->with('affection', $affection);
    }

    /**
     * Show the form for editing the specified Affection.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $affection = $this->affectionRepository->findWithoutFail($id);

        if (empty($affection)) {
            Flash::error('Affection not found');

            return redirect(route('affections.index'));
        }

        return view('affections.edit')->with('affection', $affection);
    }

    /**
     * Update the specified Affection in storage.
     *
     * @param  int              $id
     * @param UpdateAffectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAffectionRequest $request)
    {
        $affection = $this->affectionRepository->findWithoutFail($id);

        if (empty($affection)) {
            Flash::error('Affection not found');

            return redirect(route('affections.index'));
        }

        $affection = $this->affectionRepository->update($request->all(), $id);

        Flash::success('Affection updated successfully.');

        return redirect(route('affections.index'));
    }

    /**
     * Remove the specified Affection from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $affection = $this->affectionRepository->findWithoutFail($id);

        if (empty($affection)) {
            Flash::error('Affection not found');

            return redirect(route('affections.index'));
        }

        $this->affectionRepository->delete($id);

        Flash::success('Affection deleted successfully.');

        return redirect(route('affections.index'));
    }
}
