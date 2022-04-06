


select count(100) contador from cuenta where chr_cuencodigo = '00100001';
go

select int_cuencontmov nromov from Cuenta where chr_cuencodigo = '00100001'
go

update cuenta set dec_cuensaldo = dec_cuensaldo + ?, int_cuencontmov = int_cuencontmov + 1 where chr_cuencodigo = ?
go


insert into movimiento (chr_cuencodigo, int_movinumero, dtt_movifecha, chr_emplcodigo, chr_tipocodigo, dec_moviimporte) 
values(?, ?, getdate(), ?, '003', ?);
go

select * from movimiento;
go

select getdate();
go



