@extends('layouts.dashboard-siswa')

@section('breadcrumb')
   <li class="breadcrumb-item">Dashboard</li>
   <li class="breadcrumb-item active">Tagihan</li>
@endsection

@section('content')

   <div class="row">
      <div class="col-md-12">
         
         <div class="card">
            <div class="card-body">
               <div class="card-title">Tagihan Siswa</div>
               
               <!--  Row -->
                              @foreach($tagihan as $history)
                                <div class="d-flex flex-row comment-row">
                                    <i class="mdi mdi-account display-3"></i>
                                    <div class="comment-text active w-100">
                                    <hr>
                                    <span class="badge badge-success badge-rounded float-right">{{ $history->created_at->diffforHumans() }}</span>                                    
                                        <h6 class="font-medium">{{ $history->siswa->nama }}</h6>                                       
                                        <span class="m-b-15 d-block">
                                             <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Kelas {{ $history->siswa->kelas->nama_kelas }}</li>
                                                <li class="list-group-item">Jumlah Tagihan Rp.{{ $history->jumlah_bayar }}</li>
                                                <li class="list-group-item">Keterangan : {{ $history->keterangan }}</li>
                                                <li class="list-group-item">Status Bayar <b  class="text-capitalize text-bold">Belum Bayar</b></li>                                   
                                           </ul>
                                        </span>
                                        <div class="comment-footer ">
                                            <span class="text-muted float-right">{{ $history->created_at->format('M d, Y') }}</span>                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              
                          <!-- Pagination -->
					@if($tagihan->lastPage() != 1)
						<div class="btn-group float-right mt-4">		
						   <a href="{{ $tagihan->previousPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-left"></i>
						    </a>
						    @for($i = 1; $i <= $tagihan->lastPage(); $i++)
								<a class="btn btn-success {{ $i == $tagihan->currentPage() ? 'active' : '' }}" href="{{ $tagihan->url($i) }}">{{ $i }}</a>
						    @endfor
					        <a href="{{ $tagihan->nextPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-right"></i>
							</a>
					   </div>
					@endif
					<!-- End Pagination -->

               @if(count($tagihan) == 0)
				  			   <div class="text-center">Tidak ada Tagihan!</div>
					@endif
               </div>
               
            </div>
         
      
      </div>
   </div>

@endsection