<style>
    .box-scroll {
        display: flex;
        flex-wrap: nowrap;
        overflow: hidden;
        cursor: pointer;
    }

    .box-scroll .item {
        flex: 0 0 auto;
        margin-right: 10px;
        scroll-snap-align: start;
    }

    /* Hide scrollbar for Chrome, Safari, and Opera */
    .box-scroll::-webkit-scrollbar {
        display: none;
    }
</style>


<div class="col-lg-12">
    <h2 class="heading">
        PORTFOLIO
    </h2>
</div>

<div class="container-fluid">
    <div class="box-scroll row">
        @foreach ($portfolio_home as $image)
            <div class="item col-lg-4 col-md-12">
                <img src="{{ frontImage('portfolio/' . $image->image) }}" alt="" style="width: 95%;">
            </div>
        @endforeach
    </div>
</div>

<div class="col-lg-12 mb-5 text-center">
    <a href="{{ route('portfolio') }}" class="btn mt-5 px-5 theme-button">VIEW MORE OF OUR WORK!</a>
</div>
