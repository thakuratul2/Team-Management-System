@include('dashboard.layouts.header')
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
        <!-- Menu -->
        @include('dashboard.layouts.sidebar')
        <!-- / Menu -->


        <!-- Layout container -->
        <div class="layout-page">

            @include('dashboard.layouts.navbar')



            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card mb-6">
                                <!-- Account -->
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif


                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                        <form id="formAccountSettings" action="{{route('account.store')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @foreach($user_details as $user)
                                    <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">

                                        <img
                                            src="{{ $user->profile_pic ? asset('uploads/profile_pics/' . $user->profile_pic) : asset('img/avatars/1.png') }}"
                                            alt="user-avatar"
                                            class="d-block w-px-100 h-px-100 rounded"
                                            id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input
                                                    type="file"
                                                    id="upload"
                                                    class="account-file-input"
                                                    hidden
                                                    name="profile_pic"
                                                    accept="image/*" />
                                            </label>

                                            <div>Allowed JPG, GIF or PNG. Max size of 2MB</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-4">

                                        <div class="row g-6">
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    id="firstName"
                                                    name="first_name"

                                                    value="{{ucfirst($user->first_name)}}"
                                                    autofocus />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input class="form-control" type="text"
                                                       name="last_name" id="lastName"

                                                       value="{{ucfirst($user->last_name)}}"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    id="email"
                                                    name="email"

                                                    value="{{ucfirst($user->email)}}"
                                                    placeholder="john.doe@example.com" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="organization" class="form-label">Organization</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="organization"
                                                    name="organization"

                                                    value="{{$user->organization}}" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="designation" class="form-label">Designation</label>
                                                <select id="designation" name="designation"
                                                        class="select2 form-select">
                                                    <option value="" disabled {{ !$user->designation ? 'selected' : '' }}>Select Designation</option>
                                                    <option value="ceo" {{ $user->designation === 'ceo' ? 'selected' : '' }}>CEO</option>
                                                    <option value="founder" {{ $user->designation === 'founder' ? 'selected' : '' }}>FOUNDER</option>
                                                    <option value="analyst" {{ $user->designation === 'analyst' ? 'selected' : '' }}>ANALYST</option>
                                                    <option value="partner" {{ $user->designation === 'partner' ? 'selected' : '' }}>PARTNER</option>
                                                    <option value="manager" {{ $user->designation === 'manager' ? 'selected' : '' }}>MANAGER</option>
                                                </select>
                                            </div>


                                            <div class="col-md-6">
                                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">IN (+91)</span>
                                                    <input
                                                        type="text"
                                                        id="phoneNumber"
                                                        name="phone_number"
                                                        class="form-control"

                                                        value="{{ucfirst($user->phone_number)}}"
                                                        placeholder="202 555 0111" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address"
                                                       value="{{$user->address}}"
                                                       name="address" placeholder="Address" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="state" class="form-label">State</label>
                                                <input class="form-control" type="text" id="state"
                                                       value="{{$user->state}}"

                                                       name="state" placeholder="California" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="zipCode" class="form-label">Zip Code</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="zipCode"
                                                    name="zip_code"
                                                    placeholder="231465"
                                                    value="{{$user->zip_code}}"
                                                    maxlength="6" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="country">Country</label>
                                                <select id="country" name="country" class="select2 form-select">
                                                    <option value="" disabled {{ !$user->country ? 'selected' : '' }}>Select Country</option>
                                                    <option value="Australia" {{ $user->country === 'Australia' ? 'selected' : '' }}>Australia</option>
                                                    <option value="Bangladesh" {{ $user->country === 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                                    <option value="Belarus" {{ $user->country === 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                                    <option value="Brazil" {{ $user->country === 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                                    <option value="Canada" {{ $user->country === 'Canada' ? 'selected' : '' }}>Canada</option>
                                                    <option value="China" {{ $user->country === 'China' ? 'selected' : '' }}>China</option>
                                                    <option value="France" {{ $user->country === 'France' ? 'selected' : '' }}>France</option>
                                                    <option value="Germany" {{ $user->country === 'Germany' ? 'selected' : '' }}>Germany</option>
                                                    <option value="India" {{ $user->country === 'India' ? 'selected' : '' }}>India</option>
                                                    <option value="Indonesia" {{ $user->country === 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                                    <option value="Israel" {{ $user->country === 'Israel' ? 'selected' : '' }}>Israel</option>
                                                    <option value="Italy" {{ $user->country === 'Italy' ? 'selected' : '' }}>Italy</option>
                                                    <option value="Japan" {{ $user->country === 'Japan' ? 'selected' : '' }}>Japan</option>
                                                    <option value="Korea" {{ $user->country === 'Korea' ? 'selected' : '' }}>Korea, Republic of</option>
                                                    <option value="Mexico" {{ $user->country === 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                                    <option value="Philippines" {{ $user->country === 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                                    <option value="Russia" {{ $user->country === 'Russia' ? 'selected' : '' }}>Russian Federation</option>
                                                    <option value="SouthAfrica" {{ $user->country === 'SouthAfrica' ? 'selected' : '' }}>South Africa</option>
                                                    <option value="Thailand" {{ $user->country === 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                                    <option value="Turkey" {{ $user->country === 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                                    <option value="Ukraine" {{ $user->country === 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                                    <option value="UAE" {{ $user->country === 'UAE' ? 'selected' : '' }}>United Arab Emirates</option>
                                                    <option value="UK" {{ $user->country === 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                                    <option value="USA" {{ $user->country === 'USA' ? 'selected' : '' }}>United States</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="language" class="form-label">Language</label>
                                                <select id="language" name="language" class="select2 form-select">
                                                    <option value="" disabled {{ !$user->language ? 'selected' : '' }}>Select Language</option>
                                                    <option value="english" {{ $user->language === 'english' ? 'selected' : '' }}>English</option>
                                                    <option value="hindi" {{ $user->language === 'hindi' ? 'selected' : '' }}>Hindi</option>
                                                    <option value="german" {{ $user->language === 'german' ? 'selected' : '' }}>German</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="timeZones" class="form-label">Timezone</label>
                                                <select id="timeZones" name="timezone" class="select2 form-select">
                                                    <option value="" disabled {{ !$user->timezone ? 'selected' : '' }}>Select Timezone</option>
                                                    <option value="internaldatetime" {{ $user->timezone === 'internaldatetime' ? 'selected' : '' }}>(GMT-12:00) International Date Line West</option>
                                                    <option value="midway" {{ $user->timezone === 'midway' ? 'selected' : '' }}>(GMT-11:00) Midway Island, Samoa</option>
                                                    <option value="hawaii" {{ $user->timezone === 'hawaii' ? 'selected' : '' }}>(GMT-10:00) Hawaii</option>
                                                    <option value="alaska" {{ $user->timezone === 'alaska' ? 'selected' : '' }}>(GMT-09:00) Alaska</option>
                                                    <option value="pacific" {{ $user->timezone === 'pacific' ? 'selected' : '' }}>(GMT-08:00) Pacific Time (US & Canada)</option>
                                                    <option value="tijuna" {{ $user->timezone === 'tijuna' ? 'selected' : '' }}>(GMT-08:00) Tijuana, Baja California</option>
                                                    <option value="kolkata" {{ $user->timezone === 'kolkata' ? 'selected' : '' }}>(GMT+05:30) Kolkata</option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="mt-6">
                                            <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                                <!-- /Account -->
                            </div>
                            <div class="card">
                                <h5 class="card-header">Delete Account</h5>
                                <div class="card-body">
                                    <div class="mb-6 col-12 mb-0">
                                        <div class="alert alert-warning">
                                            <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                                        </div>
                                    </div>
                                    <form id="formAccountDeactivation" onsubmit="return false">
                                        <div class="form-check my-8 ms-2">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="accountActivation"
                                                id="accountActivation" />
                                            <label class="form-check-label" for="accountActivation"
                                            >I confirm my account deactivation</label
                                            >
                                        </div>
                                        <button type="submit" class="btn btn-danger deactivate-account" disabled>
                                            Deactivate Account
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->




                <div class="content-backdrop fade"></div>
            </div>
@include('dashboard.layouts.footer')
