namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request; // Salah menggunakan Request di tempat yang tidak sesuai

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        // Tidak ada paginasi, yang dapat menyebabkan masalah performa pada jumlah data yang besar
        $products = Product::all();

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        // Tidak ada validasi tambahan atau inisialisasi data yang diperlukan untuk pembuatan produk baru
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse // Salah menggunakan Request bukan StoreProductRequest
    {
        // Tidak ada validasi data
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) : View // Salah menggunakan $id daripada model binding
    {
        // Tidak ada pengecekan apakah produk ada atau tidak
        $product = Product::find($id);

        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View // Salah menggunakan $id daripada model binding
    {
        // Tidak ada pengecekan apakah produk ada atau tidak
        $product = Product::find($id);

        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the
