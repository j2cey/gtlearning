<form action="{{ route($search_route, $search_route_param) }}">
    <div class="row">

        <div class="col-xl-6 col-lg-8">
            <div class="input-group form-inline mb-3">
                <input class="form-control form-control-sm" type="search" name="q" value="{{ $q }}">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="ti-search"></i></button>
                </span>
            </div>
        </div>

    </div>
</form>
