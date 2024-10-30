
<footer class="footer">
    <div class="container">
      <div class="footer__container">
        <div class="footer__item">
          <div class="footer__war">
            <img src="/template/images/banner.jpg" alt="" class="footer__logo" />

            <div class="footer__info">
              <p class="footer__txt">
                <b>Địa chỉ:</b> {{ $contact->address }}
              </p>
              <p class="footer__txt">
                <b>Liên hệ:</b> <a href="javascript:void(0)"> {{ $contact->phone }}</a>
              </p>
              <p class="footer__txt"><b>Gmail:</b> {{ $contact->email }}</p>
            </div>
          </div>
        </div>
        <div class="footer__item">
          <h3 class="footer__list--heading">Chính Sách</h3>
          <ul class="footer__list">
            @if (count($policy) != 0)
               @foreach ($policy as $item)
                  @if ($item->is_type == 1)
                    <li class="footer__list-item">
                      <a href="/tin-tuc/{{ $item->link_url }}" class="footer__list-link">
                        {{ $item->title }}
                      </a>
                    </li>
                  @endif
              @endforeach
            @endif


          </ul>
        </div>
        <div class="footer__item">
          <h3 class="footer__list--heading">Thông Tin hổ trợ</h3>
          <ul class="footer__list">
            @if (count($policy) != 0)
               @foreach ($policy as $item)
                  @if ($item->is_type == 0)
                    <li class="footer__list-item">
                      <a href="/tin-tuc/{{ $item->link_url }}" class="footer__list-link">
                        {{ $item->title }}
                      </a>
                    </li>
                  @endif
              @endforeach
            @endif
          </ul>
        </div>
        <div class="footer__item">
          <h3 class="footer__list--heading">Fanpage</h3>
          <div class="footer__facebook">
            <div class="footer__facebook-ima">
              <img
                src="https://images.unsplash.com/photo-1499540633125-484965b60031?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=871&q=80"
                alt=""
                class="footer__facebook-image"
              />
              <div class="footer__facebook-container">
                <div class="footer__facebook-top">
                  <img
                    src="/template/images/logo.jpg"
                    alt=""
                    class="footer__facebook-thumb"
                  />
                  <div class="footer__facebook-info">
                    <div class="footer__facebook-war">
                      <a href="" class="footer__facebook-name"
                        >basic shop</a
                      >
                      <img
                        src="/template/images/active.PNG"
                        alt=""
                        class="footer__facebook-war-image"
                      />
                    </div>
                    <span class="footer__facebook-like"
                      >1000.200 người theo dổi</span
                    >
                  </div>
                </div>
                <div class="footer__facebook-bottom">
                  <a href="" class="footer__facebook-page-link">
                    <span class="footer__facebook-bottom__icon">
                      <i class="fab fa-facebook-square"></i>
                    </span>
                    theo dổi trang
                  </a>
                  <a href="" class="footer__facebook-page-share">
                    <i class="fas fa-share"></i> Chia sẽ
                  </a>
                </div>
              </div>
            </div>
          </div>
          <p class="footer__desc">
            Bạn muốn nhận khuyến mãi đặc biệt? Đăng ký ngay.
          </p>

          <div class="footer__search">
            <input
              type="text"
              class="footer__search-input"
              placeholder="Nhập Email của bạn"
            />
            <button class="btn footer__search-btn">Đăng ký</button>
          </div>
          <div class="footer-social">
            <ul class="footer-social__list">
            @if (count($soclai) != 0)
              @foreach ($soclai as $rowSoclai)

              <li class="footer-social__item">
                <a href="{{ $rowSoclai->slug_link }}" class="footer-social__link">
                  <img
                    src="{{ $rowSoclai->thumb }}"
                    alt=""
                    class="footer-social__image"
                  />
                </a>
              </li>

              @endforeach
            @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="footer__bottom">
        <ul class="footer__bottom-list">
          <li class="footer__bottom-item">
            <a href="#" class="footer__bottom-link">
              <img
                src="/template/images/vísa.png"
                alt=""
                class="footer__bottom-image"
              />
            </a>
          </li>
          <li class="footer__bottom-item">
            <a href="#" class="footer__bottom-link">
              <img
                src="/template/images/mastercard.png"
                alt=""
                class="footer__bottom-image"
              />
            </a>
          </li>
          <li class="footer__bottom-item">
            <a href="#" class="footer__bottom-link">
              <img
                src="/template/images/momo.png"
                alt=""
                class="footer__bottom-image"
              />
            </a>
          </li>
          <li class="footer__bottom-item">
            <a href="#" class="footer__bottom-link">
              <img
                src="/template/images/zalopay.png"
                alt=""
                class="footer__bottom-image"
              />
            </a>
          </li>

          <li class="footer__bottom-item">
            <a href="#" class="footer__bottom-link">
              <img
                src="/template/images/vanchuyen.jpg"
                alt=""
                class="footer__bottom-image"
              />
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
</div>

{{-- <div class="overlay modal__overlay oh"></div>
<div class="modal oh">
  <a href="javascript:void(0)" class="modal__link">
    <img
      src="https://images.unsplash.com/photo-1687255925808-b72d686d4762?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1031&q=80"
      alt=""
      class="modal__image"
    />
  </a>

  <span class="modal__close">
    <i class="fas fa-times"></i>
  </span>
</div> --}}

<div class="overlay detall__modal__overlay oh"></div>
<div class="detall__modal oh">
    <div class="detall__modal__container " >
      <div class="detall__modal__wrapper" id="detall__container__image">
      </div>
      <div class="detall__modal__wrapper">
      <div class="detall__modal__wrapper__info" id="detall__info">

      </div>

      <div class="detall__container__add">
        <div class="detall__container__add__qty">
            <button class="detall__container__add__qty-btn btn minu">
            <i class="fas fa-minus"></i>
            </button>
            <input
            type="number"
            value="1"
            class="detall__container__add__qty-number"
            id="qty"
            />
            <button class="detall__container__add__qty-btn btn plug">
            <i class="fas fa-plus"></i>
            </button>
        </div>
        <input type="text" class="oh" id="cart_product_id" value="">
        <button class="btn detall__container__add__btn" onClick="addCart()">
            THÊM VÀO GIỞ HÀNG
        </button>
        </div>
      </div>
    </div>
    <span class="detall__modal__close">
    <i class="fas fa-times"></i>
    </span>
</div>

<div class="overlay message__addcart__overlay addcart__close oh"></div>
<div class="message__addcart oh">
  <div class="message__addcart__war">
    <h2 class="message__addcart__txt">đã thêm sản phẩm giỏ hàng thành công</h2>
  </div>
  <div class="message__addcart__bottom">
    <button class="btn message__addcart__btn addcart__close">Hủy</button>
    <button id="active__cart__view" class="btn message__addcart__btn">Xem giỏ hàng</button>
  </div>

  <span class="message__addcart__close addcart__close">X</span>
</div>

<button class="btn backtop">
  <i class="fa-solid fa-chevron-up"></i>
</button>
<div class="main-contact">
  <a href="#" class="main-contact__link">
    <img src="/template/images/phone.png" alt="" class="main-contact__image" />
  </a>

  <a href="#" class="main-contact__link">
    <img src="/template/images/zalo.png" alt="" class="main-contact__image" />
  </a>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="/template/js/main.js"></script>
<script src="/template/js/all.js"></script>
