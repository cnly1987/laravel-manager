<?php

namespace App\Http\Controllers;

use App\DataTables\WorksheetDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateWorksheetRequest;
use App\Http\Requests\UpdateWorksheetRequest;
use App\Repositories\WorksheetRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WorksheetController extends AppBaseController
{
    /** @var  WorksheetRepository */
    private $worksheetRepository;

    public function __construct(WorksheetRepository $worksheetRepo)
    {
        $this->middleware('auth');
        $this->worksheetRepository = $worksheetRepo;
    }

    /**
     * Display a listing of the Worksheet.
     *
     * @param WorksheetDataTable $worksheetDataTable
     * @return Response
     */
    public function index(WorksheetDataTable $worksheetDataTable)
    {
        return $worksheetDataTable->render('worksheets.index');
    }

    /**
     * Show the form for creating a new Worksheet.
     *
     * @return Response
     */
    public function create()
    {
        return view('worksheets.create');
    }

    /**
     * Store a newly created Worksheet in storage.
     *
     * @param CreateWorksheetRequest $request
     *
     * @return Response
     */
    public function store(CreateWorksheetRequest $request)
    {
        $input = $request->all();

        $worksheet = $this->worksheetRepository->create($input);

        Flash::success('Worksheet saved successfully.');

        return redirect(route('worksheets.index'));
    }

    /**
     * Display the specified Worksheet.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $worksheet = $this->worksheetRepository->findWithoutFail($id);

        if (empty($worksheet)) {
            Flash::error('Worksheet not found');

            return redirect(route('worksheets.index'));
        }

        return view('worksheets.show')->with('worksheet', $worksheet);
    }

    /**
     * Show the form for editing the specified Worksheet.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $worksheet = $this->worksheetRepository->findWithoutFail($id);

        if (empty($worksheet)) {
            Flash::error('Worksheet not found');

            return redirect(route('worksheets.index'));
        }

        return view('worksheets.edit')->with('worksheet', $worksheet);
    }

    /**
     * Update the specified Worksheet in storage.
     *
     * @param  int              $id
     * @param UpdateWorksheetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorksheetRequest $request)
    {
        $worksheet = $this->worksheetRepository->findWithoutFail($id);

        if (empty($worksheet)) {
            Flash::error('Worksheet not found');

            return redirect(route('worksheets.index'));
        }

        $worksheet = $this->worksheetRepository->update($request->all(), $id);

        Flash::success('Worksheet updated successfully.');

        return redirect(route('worksheets.index'));
    }

    /**
     * Remove the specified Worksheet from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $worksheet = $this->worksheetRepository->findWithoutFail($id);

        if (empty($worksheet)) {
            Flash::error('Worksheet not found');

            return redirect(route('worksheets.index'));
        }

        $this->worksheetRepository->delete($id);

        Flash::success('Worksheet deleted successfully.');

        return redirect(route('worksheets.index'));
    }
}
