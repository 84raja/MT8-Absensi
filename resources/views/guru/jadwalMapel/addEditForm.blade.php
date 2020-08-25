<div class="modal fade" id="modal-addEdit">
    <div class="modal-dialog" >
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-judul"></h4>
            </div>
            <div class="modal-body" id="modal-body" style="padding-left: 5%; padding-right: 5%" >
                <form method="POST" action="{{url('guru/jadwal-mapel')}}" class="form-horizontal" data-toggle="validator">
                    {{csrf_field()}} {{method_field('POST')}}
                    
                    <div class="form-group">
                        <label>Pilih Kelas</label>
                        <select class="form-control"  name="kelas" id="kelas">
                            <option></option>
                            @foreach ($kelass as $kelas)
                                <option value="{{$kelas->id}}">{{$kelas->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih Mata Pelajaran</label>
                        <select class="form-control"  name="mapel" id="mapel">
                            <option></option>
                            @foreach ($mapels as $mapel)
                                <option value="{{$mapel->id}}">{{$mapel->nama_mapel}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih Mata Pelajaran</label>
                        <select class="form-control"  name="hari" id="hari">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jum'at">Jum'at</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam Mulai</label>
                        <input type="Text" class="form-control" id="jam" name="jam" placeholder="cotoh: 10.30">
                    </div>
                    <div class="form-group">
                        <label for="jam">Tahun Ajaran</label>
                        <input type="Text" class="form-control" id="TA" name="TA" placeholder="cotoh: 2019/2020">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="simpan" class="btn btn-primary">Simpan</button>
        </div>
        
    </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->