select * from EUREKABANK..Empleado;
go


select count(1) contador from Empleado
where vch_emplusuario='cromeroa' and vch_emplclave='chicho'
go


update cliente set vch_cliepaterno=?,
vch_cliematerno=?, vch_clienombre=? 
where chr_cliecodigo=?
go

select * from cliente;
go




