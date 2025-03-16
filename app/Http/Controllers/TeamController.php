<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Team::paginate('8');

        return response()->view('pages.Team.read', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('pages.Team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(), [
            'emp_name' => 'required|string|min:3',
            'employment_name' => 'required|string',
            'email' => 'required|email|unique:team,email',
            'description' => 'required|string',
            'picture' => 'file',
            'phone' => 'required|string',
            'facebook' => 'string',
            'linked_in' => 'string',
        ]);
        if (!$validator->fails()) {
            $team = new Team();
            $team->emp_name = $request->input('emp_name');
            $team->employment_name = $request->input('employment_name');
            $team->email = $request->input('email');
            $team->description = $request->input('description');
            $team->phone = $request->input('phone');
            $team->facebook = $request->input('facebook');
            $team->linked_in = $request->input('linked_in');
            // Handle picture upload correctly
            if ($request->hasFile('picture')) {
                $picturePath = $request->file('picture')->store('public');
                $team->picture = $picturePath;
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'No picture file found.'
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
            $saved = $team->save();

            return response()->json(
                [
                    'status' => $saved,
                    'message' => $saved ? 'Created Successfully ✔' : 'Created Failed ❌'
                ],
                $saved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
        return response()->view('pages.Team.edit', ['data' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
        $validator = validator($request->all(), [
            'emp_name' => 'required|string|min:3',
            'employment_name' => 'required|string',
            'email' => 'required|email|unique:team,email,' . $team->id,
            'description' => 'required|string',
            'picture' => 'file|image',
            'phone' => 'string',
            'facebook' => 'string',
            'linked_in' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $team->emp_name = $request->input('emp_name');
            $team->employment_name = $request->input('employment_name');
            $team->email = $request->input('email');
            $team->description = $request->input('description');
            $team->phone = $request->input('phone');
            $team->facebook = $request->input('facebook');
            $team->linked_in = $request->input('linked_in');
            // Handle picture upload correctly
            if ($request->hasFile('picture')) {
                $picturePath = $request->file('picture')->store('public');
                $team->picture = $picturePath;
            }
            $saved = $team->save();
            return   redirect()->route('team.index');
            // return redirect()->back()->with('message', $saved ? 'Created Successfully 😄' : 'Created Failed 😥')
            //     ->with('alert', $saved ? 'success' : 'warning');
        } else {

            return redirect()->route('team.edit', $team->id)->with('message', 'Created Failed 😥')
                ->with('alert', 'danger')->with('errors', $validator->getMessageBag()->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
        $deleted = $team->delete();
        return response()->json(
            ['status' => true, 'message' => $deleted > 0 ? 'Deleted Successfully' : 'Deleted Failed'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
    public function trash()
    {
        $team = Team::onlyTrashed()->paginate('8');

        return response()->view('pages.team.trash', ['data' => $team]);
    }
    public function restore(Request $request, string  $id)
    {
        $restord = Team::where('id', $id)->restore();

        return response()->json(['status' => true, 'message' => $restord ? "team member $request->name has been restored" : 'restore failed']);
    }
    public function forceDelete(Request $request, string $id)
    {
        $forceDeleted = Team::where('id', $id)->forceDelete();
        return response()->json(
            ['status' => true, 'message' => $forceDeleted > 0 ? 'Deleted Successfully' : 'Deleted Failed'],
            $forceDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
