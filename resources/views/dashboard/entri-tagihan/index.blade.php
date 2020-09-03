@extends('layouts.dashboard')

@section('breadcrumb')
   <li class="breadcrumb-item">Dashboard</li>
   <li class="breadcrumb-item active">Tagihan</li>
@endsection

@section('content')

   <div class="row">
      <div class="col-md-12">
      
         <div class="card">
            <div class="card-body">
               <div class="card-title">Entri Tagihan</div>
               
                <form method="post" action="{{ url('dashboard/tagihan') }}">
                  @csrf
                                      
                       <div class="input-group mb-3">									
                        <div class="input-group-prepend">										
                           <label class="input-group-text">										 	
                              SPP Bulan	
                           </label>
                        </div>
                        <select class="custom-select @error('spp_bulan') is-invalid @enderror" name="spp_bulan">
                           									
                              <option value="">Silahkan Pilih</option>											
                                 <option value="januari">Januari</option>
                                 <option value="februari">Februari</option>
                                 <option value="maret">Maret</option>
                                 <option value="april">April</option>
                                 <option value="mei">Mei</option>
                                 <option value="juni">Juni</option>
                                 <option value="juli">Juli</option>
                                 <option value="agustus">Agustus</option>
                                 <option value="september">September</option>
                                 <option value="oktober">Oktober</option>
                                 <option value="november">November</option>
                                 <option value="desember">Desember</option>
                       </select>
                     </div>
                     <span class="text-danger">@error('spp_bulan') {{ $message }} @enderror</span>
                  
                     <div class="form-group">
                       <label>Jumlah Bayar</label>
                       <input type="text" class="form-control @error('jumlah_bayar') is-invalid @enderror" name="jumlah_bayar">
                       <span class="text-danger">@error('jumlah_bayar') {{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                       <label>Keterangan</label>
                       <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">
                       <span class="text-danger">@error('keterangan') {{ $message }} @enderror</span>
                    </div>

                   <button type="submit" class="btn btn-success btn-rounded float-right">
                     <i class="mdi mdi-check"></i> Sebarkan
                   </button>
               
                </form>
                  
            </div>
         </div>
         
      </div>
   </div>

@endsection
  