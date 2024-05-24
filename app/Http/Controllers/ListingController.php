<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Listing;
//use Illuminate\Http\Request;
//use Illuminate\Validation\Rule;
//
//class ListingController extends Controller
//{
//    //all listing
//    public function index()
//    {
//        return view('listing.index', [
//            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)
//        ]);
//    }
//
//    //show single listing
//    public function show(Listing $listing)
//    {
//        return view('listing.show', [
//            'listing' => $listing
//        ]);
//    }
//
//    //store listing data
//    public function store(Request $request)
//    {
////        dd($request->all());
//    $formFields = $request->validate([
//        'title' => 'required',
//        'company' => ['required', Rule::unique('listings', 'company')],
//        'location' => 'required',
//        'website' => 'required',
//        'email' => ['required','email'],
//        'tags' => 'required',
//        'description' => 'required'
//    ]);
//
//    if ($request->hasfile('logo'))
//    {
//        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
//    }
//
//    $formFields['user_id'] = auth()->user()->id;
//
//    Listing::create($formFields);
//    return redirect('/')->with('message', 'Listing added!');
//    }
//
//    //show create form
//    public function create()
//    {
//        return view('listing.create');
//    }
//
//    //show edit form
//    public function edit(Listing $listing)
//    {
//        return view('listing.edit', ['listing' => $listing]);
//    }
//
//    //submit update
//    public function update(Request $request, Listing $listing)
//    {
//        if ($listing->user_id != auth()->user()->id)
//        {
//            abort(403, 'Unauthorized action.');
//        }
//
//
//        $formFields = $request->validate([
//            'title' => 'required',
//            'company' => 'required',
//            'location' => 'required',
//            'website' => 'required',
//            'email' => ['required','email'],
//            'tags' => 'required',
//            'description' => 'required'
//        ]);
//
//        if ($request->hasfile('logo'))
//        {
//            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
//        }
//        $listing->update($formFields);
//        return back()->with('message', 'Listing updated!');
//    }
//
//    //destroy
//    public function destroy(Listing $listing)
//    {
//        if ($listing->user_id != auth()->user()->id)
//        {
//            abort(403, 'Unauthorized action.');
//        }
//
//        $listing->delete();
//        return redirect('/')->with('message', 'Listing deleted!');
//    }
//
//    //manage function
//    public function manage()
//    {
//        return view('listing.manage', ['listings' => auth()->user()->listings()->get()]);
//    }
//}
