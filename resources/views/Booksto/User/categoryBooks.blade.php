<div class="iq-card">
    <div class="iq-card-body">
        <div class="row">
            @foreach ($categories->first()->books as $book)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                        <div class="iq-card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="col-6 p-0 position-relative image-overlap-shadow">
                                    <a href="javascript:void();">
                                        <img class="img-fluid rounded w-100"
                                            src="{{ Storage::url($book->images->first()->url) }}" alt="">
                                    </a>
                                    <div class="view-book">
                                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-white">Ver
                                            detalles</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <h6 class="mb-1">{{ $book->name }}</h6>
                                        @foreach ($book->authors as $author)
                                            <p class="font-size-13 line-height mb-1">
                                                {{ $author->name }}
                                            </p>
                                        @endforeach
                                        <div class="d-block line-height">
                                            <span class="font-size-11 text-warning">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="price d-flex align-items-center">
                                        <h6><b>${{ $book->price }}</b></h6>
                                    </div>
                                    <div class="iq-product-action">
                                        <a href="javascript:void();"><i
                                                class="ri-shopping-cart-2-fill text-primary"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
