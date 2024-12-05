<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="{{ route('/dashboard') }}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold">Dashboard</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
          Trang chủ
        </button>
        <div class="collapse" id="home-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('/dashboard') }}" class="link-dark rounded">Overview</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#product-collapse" aria-expanded="false">
          Sản phẩm
        </button>
        <div class="collapse" id="product-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('admin/san-pham/danh-sach') }}" class="link-dark rounded">Danh sách</a></li>
            <li><a href="{{ route('admin/san-pham/them-moi-san-pham') }}" class="link-dark rounded">Thêm mới</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#user-collapse" aria-expanded="false">
          Người dùng
        </button>
        <div class="collapse" id="user-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('admin/nguoi-dung/danh-sach') }}" class="link-dark rounded">Danh sách</a></li>
            <li><a href="{{ route('admin/nguoi-dung/them-moi-nguoi-dung') }}" class="link-dark rounded">Thêm mới</a></li>
          </ul>
        </div>
      </li>     
    </ul>
  </div>