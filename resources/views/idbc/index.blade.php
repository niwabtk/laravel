@extends('layouts.admin')
@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                            <form action="index.php" Method="GET">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">kelas</th>                        
                                            <th scope="col">kehadiran</th>
                                            <th scope="col">catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>joko</td>
                                            <td>kelas design</td>
                                            <td>
                                                <input class="" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"> Alpha&#160;
                                                <input class="" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"> Sakit&nbsp;
                                                <input class="" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"> Ijin&nbsp;
                                                <input class="" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"> Hadir&nbsp;

                                            </td>
                                            <td><input type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>  
                              <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
@endsection