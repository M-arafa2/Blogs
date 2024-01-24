  <!-- Add Mony Modal -->
  <div class="modal fade" id="addMonyModal" aria-labelledby="addMonyModal" aria-hidden="true" wire:ignore.self>
      <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5 m-0" id="addMonyModal">
                      شحن الرصيد
                  </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-0">
                  <nav>
                      <div class="nav nav-tabs wallet-tap" id="nav-tab" role="tablist">
                          <button wire:click="$set('type','credit')" class="nav-link active" id="nav-home-tab"
                              data-bs-toggle="tab" data-bs-target="#nav-card" type="button" role="tab"
                              aria-controls="nav-card" aria-selected="true">
                              <i class="fa fa-fw fa-credit-card"></i>بطاقة ائتمانية
                          </button>
                          <button wire:click="$set('type','paypal')" class="nav-link" id="nav-profile-tab"
                              data-bs-toggle="tab" data-bs-target="#nav-paypal" type="button" role="tab"
                              aria-controls="nav-paypal" aria-selected="false">
                              <i class="fa-brands fa-paypal"></i>PayPal
                          </button>
                          <button wire:click="$set('type','coupon')" class="nav-link" id="nav-contact-tab"
                              data-bs-toggle="tab" data-bs-target="#nav-tags" type="button" role="tab"
                              aria-controls="nav-tags" aria-selected="false">
                              <i class="fa fa-fw fa-tags"></i>قسيمة
                          </button>
                      </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-card" role="tabpanel"
                          aria-labelledby="nav-card-tab">
                          <div class="container-md py-2">

                              <div class="row g-2">
                                  <div class="col-12 col-md-4">
                                      <label for="" class="mb-2">
                                          المبلغ
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="input-group">
                                          <input type="number" class="form-control" wire:model="amount" />
                                          <span class="input-group-text">$</span>
                                      </div>
                                      @error('amount')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="col-12 col-md-4">
                                      <label for="" class="mb-2">
                                          الاسم الكامل علي البطاقة
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="input-group">
                                          <input type="text" class="form-control" wire:model="card_name" />
                                      </div>
                                      @error('card_name')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="col-12 col-md-4">
                                      <label for="" class="mb-2">
                                          تاريخ الانتهاء
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="input-group">
                                          <input type="date" class="form-control" wire:model="expire_date" />
                                      </div>
                                      @error('expire_date')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="col-12 col-md-4">
                                      <label for="" class="mb-2">
                                          رقم البطاقة
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="input-group">
                                          <input type="number" class="form-control" wire:model="card_no" />
                                      </div>
                                      @error('card_no')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="col-12 col-md-4">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value=""
                                              id="flexCheckDefault" wire:model="save_card" />
                                          <label class="form-check-label" for="flexCheckDefault">
                                              احفظ البطاقة لتسهيل الدفع في المستقبل
                                          </label>
                                      </div>
                                  </div>
                              </div>
                              <hr class="won-hr" />
                              <p class="mb-2">
                                  المبلغ النهائي بعد اضافة رسوم إجرائية بنسبة 2.75%
                                  على عملية الدفع *
                              </p>
                              <div class="mony text-center mb-4">
                                  <h4 class="text-success mb-0">
                                      <span class="fs-26px">0</span>
                                      <i class="fa-solid fa-dollar-sign"></i>
                                  </h4>
                              </div>
                              <small>* رسوم عملية الدفع تقتطعها بوابات الدفع الإلكترونية
                                  مثل PayPal والبطاقات الائتمانية.
                              </small>

                          </div>
                      </div>
                      <div class="tab-pane fade" id="nav-paypal" role="tabpanel" aria-labelledby="nav-paypal-tab">
                          <div class="container-md py-2">

                              <div class="row g-2">
                                  <div class="col-12 col-md-4">
                                      <label for="" class="mb-2">
                                          المبلغ
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="input-group">
                                          <input type="number" class="form-control" wire:model="amount" />
                                          <span class="input-group-text">$</span>
                                      </div>
                                      @error('amount')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <hr class="won-hr" />
                              <p class="mb-2">
                                  المبلغ النهائي بعد اضافة رسوم إجرائية بنسبة 2.75%
                                  على عملية الدفع *
                              </p>
                              <div class="mony text-center mb-4">
                                  <h4 class="text-success mb-0">
                                      <span class="fs-26px">0</span>
                                      <i class="fa-solid fa-dollar-sign"></i>
                                  </h4>
                              </div>
                              <small>* رسوم عملية الدفع تقتطعها بوابات الدفع الإلكترونية
                                  مثل PayPal والبطاقات الائتمانية.
                              </small>

                          </div>
                      </div>
                      <div class="tab-pane fade" id="nav-tags" role="tabpanel" aria-labelledby="nav-tags-tab">
                          <div class="container-md py-2">

                              <div class="row g-2">
                                  <div class="col-12 col-md-4">
                                      <label for="" class="mb-2">
                                          رمز القسيمة
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="input-group">
                                          <input type="number" class="form-control" wire:model="coupon_no" />
                                      </div>
                                      @error('coupon_no')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <div class="pay-holder gap-2 w-100 d-flex align-items-center justify-content-between">
                      <button class="main-btn flex-fill bg-success" wire:click="save">
                          <i class="fa-solid fa-sack-dollar"></i> شحن الرصيد
                      </button>
                      <div class="d-flex align-items-center gap-1">
                          <div class="circle-lock bg-success">
                              <i class="fa-solid fa-lock"></i>
                          </div>
                          <span class="text-success"> ادفع بأمان، اتصالك مشفر</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
