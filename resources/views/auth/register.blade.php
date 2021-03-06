@extends('layouts.auth')

@section('title','Registration')

@section('content')

<div class="page-content page-auth mt-5" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <h2>
                            Memulai untuk jual beli <br />
                            dengan cara terbaru
                        </h2>
                        <form class="mt-3" method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input id="name" type="text" v-model="name"autofocus class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input id="email" v-model="email" @change="checkEmailAvailable()" type="email" class="form-control @error('email') is-invalid @enderror" name="email" :class="{ 'is-invalid' : this.email_unavailable }" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Store</label>
                                    <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true" />
                                    <label class="custom-control-label" for="openStoreTrue">Iya, boleh</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input"type="radio" name="is_store_open" id="openStoreFalse" v-model="is_store_open" :value="false"/>
                                    <label class="custom-control-label"for="openStoreFalse">Enggak, makasih</label>
                                </div>
                                </div>
                            <div class="form-group" v-if="is_store_open">
                                <label>Nama Toko</label>
                                <input type="text" v-model="store_name" id="store_name" class="form-control @error("store_name") is-invalid @enderror" name="store_name" required autocomplete="store_name" autofocus/>
                                @error('store_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group" v-if="is_store_open">
                                <label>Kategori</label>
                                <select name="categories_id" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" :disabled="this.email_unavailable" class="btn btn-success btn-block mt-4">Sign Up Now</button>
                            <a href="{{ route("login") }}" class="btn btn-signup btn-block mt-2">Back to Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted);

    var register = new Vue({
        el: "#register",
        mounted() {
            AOS.init();
        },
        methods:{
            checkEmailAvailable: function(){
                let self = this;
                axios.get('{{ route("api-register-check") }}',{
                    params:{
                        email: this.email
                    }
                })
                    .then(function (res) {
                        if(res.data == "Available"){
                            self.$toasted.show("Email anda tersedia! Silahkan lanjut langkah selanjutnya!",{
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                            });
                            self.email_unavailable = false;
                        }else{
                            self.$toasted.error("Maaf, tampaknya email sudah terdaftar pada sistem kami.",{
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                            });
                            self.email_unavailable = true;
                        }
                    });
            }
        },
        data(){
            return  {
                name: "Angga Hazza Sett",
                email: "kamujagoan@bwa.id",
                is_store_open: true,
                store_name: "",
                email_unavailable:false
            }
        }
    });
</script>
@endpush
