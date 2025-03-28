<div class="list-movie-filter SearchMovies" style="margin-bottom: 50px;">
    <div class="list-movie-filter-main">
        <form id="form-filter" class="form-inline" method="GET">
            <div class="list-movie-filter-item Form-Group">
                
                <div class="">
                    <select class="" id="sort" name="filter[sort]" form="form-search">
                        <option value="">-- Sắp xếp --</option>
                        <option value="update" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'update') selected @endif>Thời gian cập nhật</option>
                        <option value="create" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'create') selected @endif>Thời gian đăng</option>
                        <option value="year" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'year') selected @endif>Năm sản xuất</option>
                        <option value="view" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'view') selected @endif>Lượt xem</option>
                    </select>
                </div>
            </div>
            <div class="list-movie-filter-item Form-Group">
                
                <div class="">
                    <select class="" id="type" name="filter[type]" form="form-search">
                        <option value="">-- Mọi định dạng --</option>
                        <option value="series" @if (isset(request('filter')['type']) && request('filter')['type'] == 'series') selected @endif>Phim bộ</option>
                        <option value="single" @if (isset(request('filter')['type']) && request('filter')['type'] == 'single') selected @endif>Phim lẻ</option>
                    </select>
                </div>
            </div>
            <div class="list-movie-filter-item Form-Group">
                
                <div class="">
                    <select class="" id="category" name="filter[category]" form="form-search">
                        <option value="">-- Thể loại --</option>
                        @foreach (\Kho8k\Core\Models\Category::fromCache()->all() as $item)
                            <option value="{{ $item->id }}" @if ((isset(request('filter')['category']) && request('filter')['category'] == $item->id) ||
                                (isset($category) && $category->id == $item->id)) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="list-movie-filter-item Form-Group">
                
                <div class="">
                    <select class="" name="filter[region]" form="form-search">
                        <option value="">-- Quốc gia --</option>
                        @foreach (\Kho8k\Core\Models\Region::fromCache()->all() as $item)
                            <option value="{{ $item->id }}" @if ((isset(request('filter')['region']) && request('filter')['region'] == $item->id) ||
                                (isset($region) && $region->id == $item->id)) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                   </select>
                </div>
            </div>
            <div class="list-movie-filter-item Form-Group">
                
                <div class="">
                    <select class="" name="filter[year]" form="form-search">
                        <option value="">-- Năm phát hành --</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}" @if (isset(request('filter')['year']) && request('filter')['year'] == $year) selected @endif>
                                {{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" form="form-search" class="btn btn-red btn-filter-movie"><span>Lọc</span></button>
            <div class="clear"></div>
        </form>
    </div>
</div>
