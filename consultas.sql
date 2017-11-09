SELECT * 
FROM asesor 
WHERE codigo IN(SELECT DISTINCT asesor 
				FROM cliente);

SELECT * 
FROM asesor as x
WHERE 1 = (SELECT count(*)
		   FROM asesor as y
		   WHERE y.cliente_asesor=x.codigo 
		   AND
		   0 = (SELECT count(*)
		   		FROM asesor AS z
		   		WHERE z.cliente_asesor=y.codigo))

