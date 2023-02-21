<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsController extends Controller
{
    private mixed $productRepository;

    public function __construct()
    {
        $this->productRepository = resolve(ProductRepositoryInterface::class);
    }

    public function index()
    {
        $products = $this->productRepository->getAll();
        return Inertia::render('Products/ProductIndex', compact('products'));
    }

    public function show($id)
    {
        $product = $this->productRepository->get($id);
        return Inertia::render('Products/ProductShow', compact('product'));
    }

    public function create()
    {
        return Inertia::render('Products/ProductCreate');
    }

    public function store(Request $request)
    {
        $this->productRepository->create($request->all());
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->productRepository->get($id);
        return Inertia::render('Products/ProductEdit', compact('product'));
    }

    public function update($id, Request $request)
    {
        $product = $this->productRepository->update($id, $request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = $this->productRepository->delete($id);
        return redirect()->route('products.index');
    }

}
