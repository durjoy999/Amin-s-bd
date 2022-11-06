<form action="{{ route('frontend.request.quote.store') }}" method="POST">
    <div class="row">
        @csrf
        <div class="col-xl-6 col-lg-12 col-sm-12 center">
            <div class="mb-3">
                <label for="quote-email" class="form-label"><strong>E-Mail <span class="text-danger">*</span> </strong></label>
                <input type="email" class="form-control Placeholder" id="quote-email" placeholder="Enter Email" name="email" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-sm-12 center">
            <div class="mb-3">
                <label for="quote-Phone" class="form-label"><strong>Phone <span class="text-danger">*</span> </strong></label>
                <input type="number" class="form-control Placeholder" id="quote-Phone" placeholder="Eenter Phone" name="phone" required>
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-sm-12 center">
            <div class="mb-3">
                <label for="quote-Name" class="form-label"><strong>Product Name <span class="text-danger">*</span> </strong></label>
                <input type="text" class="form-control Placeholder" id="quote-Name" placeholder="Enter Product Name" name="product_name" required>
                @error('product_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-sm-12 center">
            <div class="mb-3">
                <label for="quote-Quantity" class="form-label"><strong>Products Quantity <span class="text-danger">*</span> </strong> </label>
                <input type="number" class="form-control Placeholder" id="quote-Quantity" placeholder="Enter Quantity" name="quantity" required>
                @error('quantity')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-sm-12 center">
            <div class="mb-3">
                <label for="quote-PriceWith" class="form-label"><strong>Price (With Shipping)</strong></label>
                <input type="number" step="any" class="form-control Placeholder" id="quote-PriceWith" placeholder="Enter Price" name="shipping_with_cost">
                @error('shipping_with_cost')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-sm-12 center">
            <div class="mb-3">
                <label for="quote-Price" class="form-label"><strong>Price (Without Shipping)</strong></label>
                <input type="number" step="any" class="form-control Placeholder" id="quote-Price" placeholder="Enter Price" name="shipping_without_cost">
                @error('shipping_without_cost')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row center">
        <div class="mb-3">
            <label for="quote-Productslink" class="form-label"><strong>Products link(if have)</strong></label>
            <input type="text" class="form-control Placeholder" id="quote-Productslink" placeholder="Product Link" name="product_link">
            @error('product_link')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row request-custom-width">
        <button type="submit" class="btn btn-primary w-100 py-3 martin-quote">Request A Quote</button>
    </div>
</form>
