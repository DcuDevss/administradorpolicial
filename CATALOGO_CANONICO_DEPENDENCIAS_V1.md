# CATALOGO CANONICO DE DEPENDENCIAS V1

Fecha del relevamiento: 2026-08-21

Este documento es exclusivamente documental. No se crearon modelos, migraciones, tablas ni FK. Los IDs se indican como `no explícito` cuando el seeder usa autoincremento y no fija la clave primaria.

# 1. Fuentes analizadas

- `database/seeders/`: catálogos territoriales, unidades organizativas, comisarías y `Totaldependencia`.
- `app/Models/`: modelos de dependencias, unidades, inventarios, trabajos y comunicaciones.
- `database/migrations/`: tablas y FK relacionadas.
- `database/seeders/DatabaseSeeder.php`: orden y registro de seeders.
- `app/Models/User.php`, `UserSeeder.php`, `RolesSeeder.php`: pertenencia inferida de usuarios.
- `routes/web.php`, componentes Livewire y vistas: dependencias implícitas por módulo, tabla o ruta.

# 2. Catálogo bruto de registros legacy

Los registros siguientes conservan el nombre literal del seeder. En los seeders revisados no se fija `id`; por eso el ID legacy no puede conocerse de forma fiable hasta consultar una base poblada. Las cantidades son llamadas `create()` estáticas, no registros actualmente existentes.

| Fuente | Modelo | Tabla | ID legacy | Nombre original | Territorio | Clasificación | Observaciones |
|---|---|---|---|---|---|---|---|
| DependenciaUshuaiaSeeder (16) | `DependenciaUshuaia` | `dependencia_ushuaias` | no explícito | Otras; Sin datos; Comisaria Primera; Comisaria Segunda; Comisaria Tercera; Comisaria Cuarta; Comisaria Quinta; Comisaria de Familia y Genero 1; Comisaria de Familia y Genero 2; Division servicios especiales; Jefatura; Administracion Policial; Recursos Humanos; Investigaciones Criminales; Policia Cientifica; Custodia gubernamental (D.S.G.L y S.T.J) | Ushuaia | dependencia / ambiguo | Las cinco primeras comisarías también tienen tablas propias. Algunas entradas aparecen comentadas en el archivo. |
| DependenciaRiograndeSeeder (18) | `DependenciaRiogrande` | `dependencia_riograndes` | no explícito | Otras; Sin datos; Comisaria Primera R.G; Comisaria Segunda R.G; Comisaria Tercera R.G; Comisaria Cuarta R.G; Comisaria Quinta R.G; Comisaria de Familia y Genero R.G; Division servicios especiales R.G; D.R.Z.N; Escuela de Policia; Repetidora Cerro Laucha; Central Comunicaciones R.G; Investigaciones R.G; Bienestar General R.G; Brigada Narco Criminalidad R.G; Brigada Delitos complejos R.G; Automotores | Río Grande | dependencia / unidad_operativa | Los sufijos `R.G` son parte del nombre original. |
| DependenciaTolhuinSeeder (14) | `DependenciaTolhuin` | `dependencia_tolhuins` | no explícito | Otras; Sin datos; Comisaria de Tolhuin; Comisaria de Familia y Genero Tolhuin; Policia Cientifica Tolhuin; D.R.Z.C; Investigaciones Tolhuin; Brigada Narco Criminalidad Tolhuin; Brigada Delitos complejos Tolhuin; Brigada Rural; Repetidora Cerro Michi; Repetidora Estancia Tepi; Dto. Lago Escondido 460; Dto. Control de Ruta 480 | Tolhuin | dependencia / unidad_operativa | Mezcla comisarías, brigadas, repetidoras y destacamentos. |
| TotaldependenciaSeeder (66) | `Totaldependencia` | `totaldependencias` | no explícito | Otras; Sin datos; Comisaria Primera; Comisaria Segunda; Comisaria Tercera; Dto. 365 Control de ruta; Dto. 350 Pto. Almanza; Dto. 352 Ingreso ruta J; Comisaria Cuarta; Dto 450 Cria 4ta; Comisaria Quinta; Dto 550 Ingreso Andorra; Comisaria de Genero y Familia 1; Comisaria de Familia y Genero 2; Division servicios especiales D.S.E.U; Seccion canes D.S.E.U; Operaciones tacticas D.S.E.U; Grupo infanteria D.S.E.U; Grupo especial Busqueda y rescate D.S.E.U; Seccion explosivos D.S.E.U; Of. administrativa D.S.E.U; Policia Cientifica; Custodia gubernamental (D.S.G.L y S.T.J); Jefatura de policia; Asesoria letrada; Analisis criminal; Informacion institucional; Direccion secretaria general; D.G.R.Z.S; U.R.S; Sub Jefatura; Administracion Policial D.G.A; Servicios y seguros D.G.A; Adicional D.G.A; Compras D.G.A; Combustibles D.G.A; Patrimonio D.G.A; Juridico/Contable D.G.A; Tesoreria D.G.A; Taller Automotores D.G.A; Verificacion automotores D.G.A; Armeria D.G.A; Recursos Humanos D.G.R.H; Seguros ART D.G.R.H; Haberes/remuneraciones D.G.R.H; Archivos documental e informatico D.G.R.H; Of. de informatica D.G.R.H; Retiros y pensiones D.G.R.H; Junta calificatoria D.G.R.H; Asignaciones familiares D.G.R.H; Of. guardia/mesa entrada D.G.R.H; Of. secretaria D.G.R.H; Of. de servidor D.G.R.H; Sumario Policial D.G.R.H; Bienestar Policial D.G.R.H; Investigaciones Criminales D.G.I.C; Prontuario D.G.I.C; Repar(control usuarios con armas) D.G.I.C; Of.Judicial D.G.I.C; Convenio policial D.G.I.C; Mesa de entrada D.G.I.C; Carta ciudadania D.G.I.C; Brigada robos y hurtos delitos complejo D.G.I.C; Brigda narcocriminalidad D.G.I.C; detal de prontuarios (galpon) D.G.I.C; Repetidora cerro castor | no determinado; principalmente Ushuaia | catalogo_legacy / ambiguo | Catálogo amplio usado principalmente por `trabajos_informaticos`. No tiene FK padre. |
| AdministracionSeeder (14) | `Administracion` | `administracions` | no explícito | Sin dato; Otros; Jefe\Director; Segundo Jefe\Sub dierctor; Servicios y seguros; Adicional; Compras; Combustibles; Patrimonio; Juridico/Contable; Tesoreria; Taller Automotores; Verificacion automotores; Armeria | Ushuaia no persistido | unidad_organizativa | Tiene inventario mediante `administracion_id`. |
| JefaturaSeeder (12) | `Jefatura` | `jefaturas` | no explícito | Otros; Sin dato; Jefe de policia; sub Jefe de policia; Of. de guardia/mesa de entrada; Asesoria letrada; Analisis criminal; Of. de informacion institucional; secretaria general; D.G.R.Z.S; U.R.S; Sub Jefatura | Ushuaia no persistido | unidad_organizativa | Tiene inventario mediante `jefatura_id`. |
| InvestigacioneSeeder (14) | `Investigacione` | `investigaciones` | no explícito | Sin dato; Otros; Jefe\Director; Segundo Jefe\Sub dierctor; Prontuario; Repar; Of.Judicial; Convenio policial; Mesa de entrada; Carta ciudadania; Division delitos complejo; Brigda narcocriminalidad; Policia Cientifica; detal de prontuarios | Ushuaia no persistido | unidad_organizativa | Tiene inventario mediante `investigacione_id`. |
| RecursoHumanoSeeder (16) | `RecursoHumano` | `recurso_humanos` | no explícito | Sin dato; Otros; Jefe\Director; Segundo Jefe\Sub dierctor; Seguros ART; Haberes/remuneraciones; Archivos documental e informatico; Of. de informatica; Retiros y pensiones; Junta permanente calificatoria; Asignaciones familiares; Of. guardia/mesa entrada; Of. secretaria; Of. de servidor; Sumario Policial; Bienestar Policial | Ushuaia no persistido | unidad_organizativa / subarea | Bienestar y Sumarios también tienen modelos propios. |
| ServiciosespecialeSeeder (10) | `Serviciosespeciale` | `serviciosespeciales` | no explícito | Otras; Sin datos; jefe; sub jefe; Seccion canes; Operaciones tacticas; Grupo infanteria; Grupo especial Busqueda y rescate; Seccion explosivos; Of administrativa | Ushuaia no persistido | unidad_operativa | Tiene inventario mediante `serviciosespeciale_id`. |
| CustodiagubernamentaleSeeder (14) | `Custodiagubernamentale` | `custodiagubernamentales` | no explícito | Otras; Sin datos; Of. del jefe; Of. del subjefe; Of. de guardia; Of sistema de video vigilancia; Planta baja; Primer piso; Segundo piso; Superior tribunal de justicia; Presidencia; Legislatura; Cadic vivienda gubernamental; Casa de gobierno | Ushuaia no persistido | unidad_operativa / ambiguo | Mezcla oficinas, ubicaciones y destinos externos. |
| CientificaSeeder (9) | `Cientifica` | `cientificas` | no explícito | Otras; Sin datos; jefe; Of. de guardia 1; Of. de guardia 2; Of. administrativa; Of. Accidente vial; Of. MIS (huellas e inspecciones); Sistemas MBIS | Ushuaia no persistido | unidad_organizativa | Asociada a Investigaciones en el inventario. |
| BienestareSeeder (7) | `Bienestare` | `bienestares` | no explícito | Sin dato; Otros; Jefe; Of. de Medicos; Of. de Certificados; Of. administrativa; Mesa de entrada | Ushuaia no persistido | subarea | Se relaciona con inventario de RRHH. |
| SumarioSeeder (4) | `Sumario` | `sumarios` | no explícito | Sin dato; Otros; Jefe; Of. general de sumario | Ushuaia no persistido | subarea | Se relaciona con inventario de RRHH. |
| DestacamentoSeeder (6) | `Destacamento` | `destacamentos` | no explícito | Sin datos; Dto 365 Control de ruta; Dto 350 Pto. Almanza; Dto 352 Ingreso ruta J; Dto 450 Cria 4ta; Dto 550 Ingreo Andorra | Ushuaia no persistido | unidad_operativa | `Ingreo` difiere de `Ingreso` en `TotaldependenciaSeeder`. |
| OtrasInstitucioneSeeder (15) | `OtrasInstitucione` | `otras_instituciones` | no explícito | Sin datos; Otros; Gobierno TDF; Policia Seguridad Aeropuertaria; Policia Federal Argentina; Gendarmeria Argentina; Prefectura Naval Argentina; Armada Argentina; Vialidad Provincial; H.R.U; Central de Emergencias Medicas; Central 911; Proteccion Civil; Defensa Civil; Parque nacional | no determinado | institucion_externa | Destino de `trabajos_generales`, no dependencia policial confirmada. |
| SubJefaturaSeeder (4) | `SubJefatura` | `sub_jefaturas` | no explícito | registros sin catálogo nominal revisado | no determinado | ambiguo | Tabla auxiliar con `id` y timestamps según migración. |
| TerceradestacamentoSeeder (5) | `Terceradestacamento` | `terceradestacamentos` | no explícito | registros no nominales revisados | no determinado | unidad_operativa | Requiere revisar su uso antes de clasificarlo definitivamente. |

Las cinco fuentes `ComisariaPrimeraSeeder` a `ComisariaQuintaSeeder` crean aproximadamente 32 registros cada una, pero combinan filas de oficinas y tipos de equipo mediante campos como `tipo_oficina` y `tipo_equipo`. No son catálogos de dependencias: la dependencia se codifica en el nombre de la tabla y del modelo.

# 3. Nombres normalizados

La normalización siguiente es solo comparativa: minúsculas, eliminación de acentos y espacios extremos, y homogeneización de puntuación. No implica fusión.

| Nombre original | Nombre normalizado | Fuente | ID |
|---|---|---|---|
| Comisaria Primera | comisaria primera | DependenciaUshuaiaSeeder / TotaldependenciaSeeder | no explícito |
| Comisaria Primera R.G | comisaria primera rg | DependenciaRiograndeSeeder | no explícito |
| Comisaria de Familia y Genero 1 | comisaria de familia y genero 1 | DependenciaUshuaiaSeeder | no explícito |
| Comisaria de Genero y Familia 1 | comisaria de genero y familia 1 | TotaldependenciaSeeder | no explícito |
| Comisaria de Familia y Genero R.G | comisaria de familia y genero rg | DependenciaRiograndeSeeder | no explícito |
| Comisaria de Familia y Genero Tolhuin | comisaria de familia y genero tolhuin | DependenciaTolhuinSeeder | no explícito |
| Dto 550 Ingreo Andorra | dto 550 ingreo andorra | DestacamentoSeeder | no explícito |
| Dto 550 Ingreso Andorra | dto 550 ingreso andorra | TotaldependenciaSeeder | no explícito |
| Policia Cientifica | policia cientifica | InvestigacioneSeeder / TotaldependenciaSeeder | no explícito |
| Policia Cientifica Tolhuin | policia cientifica tolhuin | DependenciaTolhuinSeeder | no explícito |
| Bienestar Policial | bienestar policial | RecursoHumanoSeeder / TotaldependenciaSeeder | no explícito |
| Investigaciones Criminales | investigaciones criminales | DependenciaUshuaiaSeeder / TotaldependenciaSeeder | no explícito |
| Division servicios especiales | division servicios especiales | DependenciaUshuaiaSeeder | no explícito |
| Division servicios especiales D.S.E.U | division servicios especiales dseu | TotaldependenciaSeeder | no explícito |

# 4. Posibles equivalencias

| Registro A | Registro B | Motivo | Confianza | Requiere validación |
|---|---|---|---|---|
| `DependenciaUshuaiaSeeder`: Comisaria Primera | `TotaldependenciaSeeder`: Comisaria Primera | Nombre normalizado idéntico | Alta | Sí, confirmar que representan el mismo destino |
| `DependenciaUshuaiaSeeder`: Comisaria Primera | tabla `comisaria_primeras` / modelo `ComisariaPrimera` | Nombre de dependencia coincide con tabla y modelo | Alta | Sí, confirmar alcance territorial |
| `DependenciaRiograndeSeeder`: Comisaria Primera R.G | Comisaria Primera | Misma denominación base con sufijo territorial | Media | Sí |
| `DependenciaUshuaiaSeeder`: Comisaria de Familia y Genero 1 | `TotaldependenciaSeeder`: Comisaria de Genero y Familia 1 | Diferencia de orden de palabras | Media | Sí |
| `DestacamentoSeeder`: Dto 550 Ingreo Andorra | `TotaldependenciaSeeder`: Dto 550 Ingreso Andorra | Diferencia ortográfica evidente | Alta | Sí, validar nombre oficial |
| `RecursoHumanoSeeder`: Bienestar Policial | `TotaldependenciaSeeder`: Bienestar Policial D.G.R.H | Nombre base y unidad superior coincidente | Media | Sí |
| `InvestigacioneSeeder`: Policia Cientifica | `TotaldependenciaSeeder`: Policia Cientifica | Nombre idéntico | Alta | Sí, confirmar si es unidad o subárea |
| `ServiciosespecialeSeeder`: Seccion canes | `TotaldependenciaSeeder`: Seccion canes D.S.E.U | Nombre base y sigla de unidad | Media | Sí |
| `AdministracionSeeder`: Compras | `TotaldependenciaSeeder`: Compras D.G.A | Nombre base y unidad superior coincidente | Alta | Sí |
| `JefaturaSeeder`: Asesoria letrada | `TotaldependenciaSeeder`: Asesoria letrada | Nombre normalizado equivalente | Alta | Sí |
| `DependenciaTolhuinSeeder`: Dto. Control de Ruta 480 | `TotaldependenciaSeeder`: Dto. 365 Control de ruta | Ambos son destacamentos, pero números distintos | Baja | Sí, no fusionar sin evidencia |

# 5. Catálogo canónico propuesto

El siguiente catálogo es una hipótesis de agrupación, no una decisión de migración. `Padre propuesto` queda vacío cuando no existe evidencia suficiente.

| Nombre canónico | Tipo | Territorio | Padre propuesto | Registros legacy asociados | Confianza |
|---|---|---|---|---|---|
| Comisaría Primera | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_primeras`, `userComisaria1` | Alta |
| Comisaría Segunda | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_segundas`, `userComisaria2` | Alta |
| Comisaría Tercera | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_terceras`, `userComisaria3` | Alta |
| Comisaría Cuarta | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_cuartas`, `userComisaria4` | Alta |
| Comisaría Quinta | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_quintas`, `userComisaria5` | Alta |
| Administración | unidad_organizativa | no confirmado |  | `administracions`, `administraciongenerales`, `Totaldependencia` con sufijo D.G.A | Media |
| Jefatura | unidad_organizativa | no confirmado |  | `jefaturas`, `jefaturagenerales`, `Totaldependencia` | Media |
| Investigaciones | unidad_organizativa | no confirmado |  | `investigaciones`, `investigacionesgenerales`, `Totaldependencia` con sufijo D.G.I.C | Media |
| Recursos Humanos | unidad_organizativa | no confirmado |  | `recurso_humanos`, `recursoshumanosgenerales`, `Totaldependencia` con sufijo D.G.R.H | Media |
| Servicios Especiales | unidad_operativa | no confirmado |  | `serviciosespeciales`, `serviciosespecialesgenerales`, `Totaldependencia` D.S.E.U | Media |
| Custodia Gubernamental | unidad_operativa | no confirmado |  | `custodiagubernamentales`, `custodiagubernamentalgenerales`, `Totaldependencia` | Media |
| Policía Científica | unidad_organizativa | no confirmado |  | `cientificas`, `investigacionesgenerales`, `Totaldependencia` | Media |
| Bienestar Policial | subarea | no confirmado |  | `bienestares`, `recursoshumanosgenerales`, `Totaldependencia` D.G.R.H | Media |
| Sumario Policial | subarea | no confirmado |  | `sumarios`, `recursoshumanosgenerales`, `Totaldependencia` D.G.R.H | Media |
| Destacamento | unidad_operativa | no confirmado |  | `destacamentos`, `Totaldependencia`, dependencias territoriales | Baja |

# 6. Totaldependencia

`Totaldependencia` se define en [Totaldependencia.php](app/Models/Totaldependencia.php) y [2023_07_25_150655_create_totaldependencias_table.php](database/migrations/2023_07_25_150655_create_totaldependencias_table.php). Tiene solo `id`, `nombre` y timestamps. Su seeder contiene 66 inserciones.

Su uso persistido confirmado es:

- `trabajos_informaticos.totaldependencia_id` -> `totaldependencias.id`.
- `TrabajosInformatico::totaldependencia()`.
- Componentes de creación y consulta de trabajos informáticos.

El catálogo mezcla:

- Comisarías.
- Destacamentos.
- Subáreas de D.S.E.U, D.G.A, D.G.R.H y D.G.I.C.
- Jefatura, Administración e Investigaciones.
- Policía Científica y Custodia.
- Valores genéricos como `Otras` y `Sin datos`.

No hay evidencia suficiente para afirmar que todos sus registros sean dependencias formales. Se clasifica provisionalmente como `catalogo_legacy` y fuente de mapeo, no como fuente canónica confirmada.

# 7. Comisarías

Las tablas `comisaria_primeras` a `comisaria_quintas` no tienen FK genérica de dependencia. El destino se identifica por:

```text
nombre de tabla -> modelo -> ruta -> componente Livewire
```

Ejemplo documentado: `comisaria_primeras` -> `ComisariaPrimera` -> rutas de `comisaria1`.

Las tablas no tienen una relación directa con `User`, trabajos o una tabla de dependencia. Sus seeders individuales crean filas de oficinas y equipos; por lo tanto, el dato de dependencia no está en cada fila.

La equivalencia con `DependenciaUshuaiaSeeder` y `TotaldependenciaSeeder` es fuerte para las cinco comisarías por coincidencia de nombre y contexto, pero debe validarse funcionalmente antes de migrar.

# 8. Río Grande

Fuentes principales:

- `Riogrande` / `riograndes`: cabecera territorial.
- `DependenciaRiogrande` / `dependencia_riograndes`: catálogo de dependencias concretas.
- `Riograndegenerale` / `riograndegenerales`: inventario con `riogrande_id` y `dependencia_riogrande_id`.
- `Comunicacionesrg` / `comunicacionesrgs`: comunicación con `dependencia_riogrande_id`.

El significado aparente es:

```text
riogrande_id = cabecera o ámbito territorial
dependencia_riogrande_id = dependencia concreta
```

La relación `DependenciaRiogrande::trabajosgenerale()` usa `dependencia_rg_id`, mientras la migración y `TrabajosGenerale` usan `dependencia_riogrande_id`. Es una inconsistencia no resuelta.

# 9. Tolhuin

Fuentes principales:

- `Tolhuin` / `tolhuins`: cabecera territorial.
- `DependenciaTolhuin` / `dependencia_tolhuins`: catálogo de dependencias concretas.
- `Tolhuingenerale` / `tolhuingenerales`: inventario con `tolhuin_id` y `dependencia_tolhuin_id`.
- `Comunicacionestolhuin` / `comunicacionestolhuins`: comunicación con `dependencia_tolhuin_id`.

El patrón aparente es equivalente al de Río Grande. No se encontró la variante `dependencia_tl_id` ni una discrepancia nominal equivalente; sí debe confirmarse si `tolhuin_id` es territorio o unidad superior.

# 10. Usuarios y pertenencia

La tabla `users` no tiene FK de dependencia. La pertenencia se infiere por:

- Nombre de usuario.
- Email.
- Rol Spatie.
- IDs fijos en componentes.
- Ruta o módulo accedido.
- Relaciones de notificaciones con usuarios, que no equivalen a pertenencia.

Ejemplos:

- `userComisaria1` sugiere Comisaría Primera.
- `userComisaria2` a `userComisaria5` siguen el mismo patrón.
- `Adminrg` sugiere Río Grande, pero mezcla territorio y función administrativa.

No existe una relación formal `User -> Dependencia` ni `User -> UnidadOrganizativa`.

# 11. Casos ambiguos

- `Otras` y `Sin datos`: son valores de reserva, no dependencias reales confirmadas.
- `Totaldependencia`: mezcla niveles organizativos y destinos sin jerarquía.
- `Riogrande`/`Tolhuin` frente a sus catálogos `Dependencia*`: cabecera territorial o unidad superior no confirmado.
- Administración, Jefatura e Investigaciones: podrían ser dependencias o áreas internas.
- Bienestar y Sumarios: parecen subáreas de RRHH, pero la jerarquía no está persistida.
- Custodia: combina oficinas, pisos, organismos externos y ubicaciones.
- `OtrasInstitucione`: contiene organismos externos; no debe fusionarse automáticamente con dependencias policiales.
- `Comisaria de Familia y Genero 1` frente a `Comisaria de Genero y Familia 1`: posible equivalencia, no confirmada.
- `Comisaria Primera` frente a `Comisaria Primera R.G`: misma denominación base, territorios distintos.
- `Dto. Control de Ruta 480` frente a `Dto. 365 Control de ruta`: nombres parecidos, pero números diferentes.

# 12. Riesgos de migración

1. Fusionar nombres sin preservar fuente, tabla e ID original.
2. Confundir territorio con dependencia concreta.
3. Convertir `Totaldependencia` en fuente canónica sin validar sus 66 registros.
4. Migrar comisarías sin una relación explícita por fila.
5. Inferir la dependencia de comunicaciones únicamente por la ruta.
6. Tratar roles como pertenencia organizativa.
7. Perder la diferencia entre unidad, subárea y ubicación.
8. Interpretar `riogrande_id` y `dependencia_riogrande_id` como el mismo concepto.
9. Ignorar la discrepancia `dependencia_rg_id`.
10. Confundir instituciones externas con dependencias policiales.
11. Conservar nombres duplicados por diferencias ortográficas sin un estado de validación.
12. Asignar padres jerárquicos sin evidencia funcional.

# 13. Fuentes de verdad actuales

| Fuente | Evaluación |
|---|---|
| `DependenciaUshuaia`, `DependenciaRiogrande`, `DependenciaTolhuin` | Fuentes territoriales activas para varios inventarios, trabajos y comunicaciones |
| Catálogos `Administracion`, `Jefatura`, `Investigacione`, etc. | Fuentes de unidades funcionales específicas |
| `Totaldependencia` | Catálogo consolidado/paralelo usado por trabajos informáticos |
| Tablas `comisaria_*` | Fuente estructural de inventario, con dependencia implícita |
| Tablas de comunicaciones específicas | Fuente estructural y/o territorial según la variante |
| Usuarios y roles | Referencias indirectas, no fuente formal de dependencia |
| Rutas y componentes Livewire | Contexto operativo; no fuente persistente |

No existe una única fuente de verdad actual.

# 14. Recomendaciones para el siguiente relevamiento

1. Obtener una exportación real de cada catálogo cuando exista una base disponible, sin modificarla.
2. Construir una matriz `fuente + tabla + id + nombre + territorio + contexto`.
3. Validar manualmente las equivalencias de nombres.
4. Confirmar la jerarquía oficial entre territorio, dependencia, unidad y subárea.
5. Identificar el significado funcional de `riogrande_id` y `tolhuin_id`.
6. Revisar todos los componentes que asignan IDs literales de dependencia.
7. Documentar el mapeo de cada tabla de comunicaciones implícita.
8. Determinar si los usuarios tienen una dependencia principal o varias.
9. Definir si las instituciones externas se modelarán fuera del catálogo policial.
10. Mantener este catálogo como documento de análisis y no como migración automática.

## Resumen

- Registros de inserción estática en las fuentes principales: **404**.
- Fuentes con mayor volumen: `TotaldependenciaSeeder` (66), tres catálogos territoriales (48 en conjunto) y cinco seeders de comisarías (32 cada uno).
- Posibles equivalencias documentadas: **11**.
- Casos ambiguos explícitos: **11**.
- Clasificación aproximada del catálogo por fuente: territorio/dependencia territorial, unidad organizativa, subárea, unidad operativa, institución externa y catálogo legacy.
- Principales duplicaciones:
  - Comisarías entre catálogos, tablas, rutas y roles.
  - Administración, Jefatura, RRHH e Investigaciones entre catálogos específicos y `Totaldependencia`.
  - Destacamentos entre `Destacamento`, `Totaldependencia` y dependencias territoriales.
  - Policía Científica, Bienestar y Sumarios entre unidades específicas y catálogos consolidados.

Este documento no decide fusiones definitivas. Cada equivalencia debe conservar la evidencia exacta y validarse antes de diseñar el modelo lógico.
# CATALOGO CANONICO DE DEPENDENCIAS V1

Fecha del relevamiento: 2026-08-21

Este documento es exclusivamente documental. No se crearon modelos, migraciones, tablas ni FK. Los IDs se indican como `no explícito` cuando el seeder usa autoincremento y no fija la clave primaria.

# 1. Fuentes analizadas

- `database/seeders/`: catálogos territoriales, unidades organizativas, comisarías y `Totaldependencia`.
- `app/Models/`: modelos de dependencias, unidades, inventarios, trabajos y comunicaciones.
- `database/migrations/`: tablas y FK relacionadas.
- `database/seeders/DatabaseSeeder.php`: orden y registro de seeders.
- `app/Models/User.php`, `UserSeeder.php`, `RolesSeeder.php`: pertenencia inferida de usuarios.
- `routes/web.php`, componentes Livewire y vistas: dependencias implícitas por módulo, tabla o ruta.

# 2. Catálogo bruto de registros legacy

Los registros siguientes conservan el nombre literal del seeder. En los seeders revisados no se fija `id`; por eso el ID legacy no puede conocerse de forma fiable hasta consultar una base poblada. Las cantidades son llamadas `create()` estáticas, no registros actualmente existentes.

| Fuente | Modelo | Tabla | ID legacy | Nombre original | Territorio | Clasificación | Observaciones |
|---|---|---|---|---|---|---|---|
| DependenciaUshuaiaSeeder (16) | `DependenciaUshuaia` | `dependencia_ushuaias` | no explícito | Otras; Sin datos; Comisaria Primera; Comisaria Segunda; Comisaria Tercera; Comisaria Cuarta; Comisaria Quinta; Comisaria de Familia y Genero 1; Comisaria de Familia y Genero 2; Division servicios especiales; Jefatura; Administracion Policial; Recursos Humanos; Investigaciones Criminales; Policia Cientifica; Custodia gubernamental (D.S.G.L y S.T.J) | Ushuaia | dependencia / ambiguo | Las cinco primeras comisarías también tienen tablas propias. Algunas entradas aparecen comentadas en el archivo. |
| DependenciaRiograndeSeeder (18) | `DependenciaRiogrande` | `dependencia_riograndes` | no explícito | Otras; Sin datos; Comisaria Primera R.G; Comisaria Segunda R.G; Comisaria Tercera R.G; Comisaria Cuarta R.G; Comisaria Quinta R.G; Comisaria de Familia y Genero R.G; Division servicios especiales R.G; D.R.Z.N; Escuela de Policia; Repetidora Cerro Laucha; Central Comunicaciones R.G; Investigaciones R.G; Bienestar General R.G; Brigada Narco Criminalidad R.G; Brigada Delitos complejos R.G; Automotores | Río Grande | dependencia / unidad_operativa | Los sufijos `R.G` son parte del nombre original. |
| DependenciaTolhuinSeeder (14) | `DependenciaTolhuin` | `dependencia_tolhuins` | no explícito | Otras; Sin datos; Comisaria de Tolhuin; Comisaria de Familia y Genero Tolhuin; Policia Cientifica Tolhuin; D.R.Z.C; Investigaciones Tolhuin; Brigada Narco Criminalidad Tolhuin; Brigada Delitos complejos Tolhuin; Brigada Rural; Repetidora Cerro Michi; Repetidora Estancia Tepi; Dto. Lago Escondido 460; Dto. Control de Ruta 480 | Tolhuin | dependencia / unidad_operativa | Mezcla comisarías, brigadas, repetidoras y destacamentos. |
| TotaldependenciaSeeder (66) | `Totaldependencia` | `totaldependencias` | no explícito | Otras; Sin datos; Comisaria Primera; Comisaria Segunda; Comisaria Tercera; Dto. 365 Control de ruta; Dto. 350 Pto. Almanza; Dto. 352 Ingreso ruta J; Comisaria Cuarta; Dto 450 Cria 4ta; Comisaria Quinta; Dto 550 Ingreso Andorra; Comisaria de Genero y Familia 1; Comisaria de Familia y Genero 2; Division servicios especiales D.S.E.U; Seccion canes D.S.E.U; Operaciones tacticas D.S.E.U; Grupo infanteria D.S.E.U; Grupo especial Busqueda y rescate D.S.E.U; Seccion explosivos D.S.E.U; Of. administrativa D.S.E.U; Policia Cientifica; Custodia gubernamental (D.S.G.L y S.T.J); Jefatura de policia; Asesoria letrada; Analisis criminal; Informacion institucional; Direccion secretaria general; D.G.R.Z.S; U.R.S; Sub Jefatura; Administracion Policial D.G.A; Servicios y seguros D.G.A; Adicional D.G.A; Compras D.G.A; Combustibles D.G.A; Patrimonio D.G.A; Juridico/Contable D.G.A; Tesoreria D.G.A; Taller Automotores D.G.A; Verificacion automotores D.G.A; Armeria D.G.A; Recursos Humanos D.G.R.H; Seguros ART D.G.R.H; Haberes/remuneraciones D.G.R.H; Archivos documental e informatico D.G.R.H; Of. de informatica D.G.R.H; Retiros y pensiones D.G.R.H; Junta calificatoria D.G.R.H; Asignaciones familiares D.G.R.H; Of. guardia/mesa entrada D.G.R.H; Of. secretaria D.G.R.H; Of. de servidor D.G.R.H; Sumario Policial D.G.R.H; Bienestar Policial D.G.R.H; Investigaciones Criminales D.G.I.C; Prontuario D.G.I.C; Repar(control usuarios con armas) D.G.I.C; Of.Judicial D.G.I.C; Convenio policial D.G.I.C; Mesa de entrada D.G.I.C; Carta ciudadania D.G.I.C; Brigada robos y hurtos delitos complejo D.G.I.C; Brigda narcocriminalidad D.G.I.C; detal de prontuarios (galpon) D.G.I.C; Repetidora cerro castor | no determinado; principalmente Ushuaia | catalogo_legacy / ambiguo | Catálogo amplio usado principalmente por `trabajos_informaticos`. No tiene FK padre. |
| AdministracionSeeder (14) | `Administracion` | `administracions` | no explícito | Sin dato; Otros; Jefe\Director; Segundo Jefe\Sub dierctor; Servicios y seguros; Adicional; Compras; Combustibles; Patrimonio; Juridico/Contable; Tesoreria; Taller Automotores; Verificacion automotores; Armeria | Ushuaia no persistido | unidad_organizativa | Tiene inventario mediante `administracion_id`. |
| JefaturaSeeder (12) | `Jefatura` | `jefaturas` | no explícito | Otros; Sin dato; Jefe de policia; sub Jefe de policia; Of. de guardia/mesa de entrada; Asesoria letrada; Analisis criminal; Of. de informacion institucional; secretaria general; D.G.R.Z.S; U.R.S; Sub Jefatura | Ushuaia no persistido | unidad_organizativa | Tiene inventario mediante `jefatura_id`. |
| InvestigacioneSeeder (14) | `Investigacione` | `investigaciones` | no explícito | Sin dato; Otros; Jefe\Director; Segundo Jefe\Sub dierctor; Prontuario; Repar; Of.Judicial; Convenio policial; Mesa de entrada; Carta ciudadania; Division delitos complejo; Brigda narcocriminalidad; Policia Cientifica; detal de prontuarios | Ushuaia no persistido | unidad_organizativa | Tiene inventario mediante `investigacione_id`. |
| RecursoHumanoSeeder (16) | `RecursoHumano` | `recurso_humanos` | no explícito | Sin dato; Otros; Jefe\Director; Segundo Jefe\Sub dierctor; Seguros ART; Haberes/remuneraciones; Archivos documental e informatico; Of. de informatica; Retiros y pensiones; Junta permanente calificatoria; Asignaciones familiares; Of. guardia/mesa entrada; Of. secretaria; Of. de servidor; Sumario Policial; Bienestar Policial | Ushuaia no persistido | unidad_organizativa / subarea | Bienestar y Sumarios también tienen modelos propios. |
| ServiciosespecialeSeeder (10) | `Serviciosespeciale` | `serviciosespeciales` | no explícito | Otras; Sin datos; jefe; sub jefe; Seccion canes; Operaciones tacticas; Grupo infanteria; Grupo especial Busqueda y rescate; Seccion explosivos; Of administrativa | Ushuaia no persistido | unidad_operativa | Tiene inventario mediante `serviciosespeciale_id`. |
| CustodiagubernamentaleSeeder (14) | `Custodiagubernamentale` | `custodiagubernamentales` | no explícito | Otras; Sin datos; Of. del jefe; Of. del subjefe; Of. de guardia; Of sistema de video vigilancia; Planta baja; Primer piso; Segundo piso; Superior tribunal de justicia; Presidencia; Legislatura; Cadic vivienda gubernamental; Casa de gobierno | Ushuaia no persistido | unidad_operativa / ambiguo | Mezcla oficinas, ubicaciones y destinos externos. |
| CientificaSeeder (9) | `Cientifica` | `cientificas` | no explícito | Otras; Sin datos; jefe; Of. de guardia 1; Of. de guardia 2; Of. administrativa; Of. Accidente vial; Of. MIS (huellas e inspecciones); Sistemas MBIS | Ushuaia no persistido | unidad_organizativa | Asociada a Investigaciones en el inventario. |
| BienestareSeeder (7) | `Bienestare` | `bienestares` | no explícito | Sin dato; Otros; Jefe; Of. de Medicos; Of. de Certificados; Of. administrativa; Mesa de entrada | Ushuaia no persistido | subarea | Se relaciona con inventario de RRHH. |
| SumarioSeeder (4) | `Sumario` | `sumarios` | no explícito | Sin dato; Otros; Jefe; Of. general de sumario | Ushuaia no persistido | subarea | Se relaciona con inventario de RRHH. |
| DestacamentoSeeder (6) | `Destacamento` | `destacamentos` | no explícito | Sin datos; Dto 365 Control de ruta; Dto 350 Pto. Almanza; Dto 352 Ingreso ruta J; Dto 450 Cria 4ta; Dto 550 Ingreo Andorra | Ushuaia no persistido | unidad_operativa | `Ingreo` difiere de `Ingreso` en `TotaldependenciaSeeder`. |
| OtrasInstitucioneSeeder (15) | `OtrasInstitucione` | `otras_instituciones` | no explícito | Sin datos; Otros; Gobierno TDF; Policia Seguridad Aeropuertaria; Policia Federal Argentina; Gendarmeria Argentina; Prefectura Naval Argentina; Armada Argentina; Vialidad Provincial; H.R.U; Central de Emergencias Medicas; Central 911; Proteccion Civil; Defensa Civil; Parque nacional | no determinado | institucion_externa | Destino de `trabajos_generales`, no dependencia policial confirmada. |
| SubJefaturaSeeder (4) | `SubJefatura` | `sub_jefaturas` | no explícito | registros sin catálogo nominal revisado | no determinado | ambiguo | Tabla auxiliar con `id` y timestamps según migración. |
| TerceradestacamentoSeeder (5) | `Terceradestacamento` | `terceradestacamentos` | no explícito | registros no nominales revisados | no determinado | unidad_operativa | Requiere revisar su uso antes de clasificarlo definitivamente. |

Las cinco fuentes `ComisariaPrimeraSeeder` a `ComisariaQuintaSeeder` crean aproximadamente 32 registros cada una, pero combinan filas de oficinas y tipos de equipo mediante campos como `tipo_oficina` y `tipo_equipo`. No son catálogos de dependencias: la dependencia se codifica en el nombre de la tabla y del modelo.

# 3. Nombres normalizados

La normalización siguiente es solo comparativa: minúsculas, eliminación de acentos y espacios extremos, y homogeneización de puntuación. No implica fusión.

| Nombre original | Nombre normalizado | Fuente | ID |
|---|---|---|---|
| Comisaria Primera | comisaria primera | DependenciaUshuaiaSeeder / TotaldependenciaSeeder | no explícito |
| Comisaria Primera R.G | comisaria primera rg | DependenciaRiograndeSeeder | no explícito |
| Comisaria de Familia y Genero 1 | comisaria de familia y genero 1 | DependenciaUshuaiaSeeder | no explícito |
| Comisaria de Genero y Familia 1 | comisaria de genero y familia 1 | TotaldependenciaSeeder | no explícito |
| Comisaria de Familia y Genero R.G | comisaria de familia y genero rg | DependenciaRiograndeSeeder | no explícito |
| Comisaria de Familia y Genero Tolhuin | comisaria de familia y genero tolhuin | DependenciaTolhuinSeeder | no explícito |
| Dto 550 Ingreo Andorra | dto 550 ingreo andorra | DestacamentoSeeder | no explícito |
| Dto 550 Ingreso Andorra | dto 550 ingreso andorra | TotaldependenciaSeeder | no explícito |
| Policia Cientifica | policia cientifica | InvestigacioneSeeder / TotaldependenciaSeeder | no explícito |
| Policia Cientifica Tolhuin | policia cientifica tolhuin | DependenciaTolhuinSeeder | no explícito |
| Bienestar Policial | bienestar policial | RecursoHumanoSeeder / TotaldependenciaSeeder | no explícito |
| Investigaciones Criminales | investigaciones criminales | DependenciaUshuaiaSeeder / TotaldependenciaSeeder | no explícito |
| Division servicios especiales | division servicios especiales | DependenciaUshuaiaSeeder | no explícito |
| Division servicios especiales D.S.E.U | division servicios especiales dseu | TotaldependenciaSeeder | no explícito |

# 4. Posibles equivalencias

| Registro A | Registro B | Motivo | Confianza | Requiere validación |
|---|---|---|---|---|
| `DependenciaUshuaiaSeeder`: Comisaria Primera | `TotaldependenciaSeeder`: Comisaria Primera | Nombre normalizado idéntico | Alta | Sí, confirmar que representan el mismo destino |
| `DependenciaUshuaiaSeeder`: Comisaria Primera | tabla `comisaria_primeras` / modelo `ComisariaPrimera` | Nombre de dependencia coincide con tabla y modelo | Alta | Sí, confirmar alcance territorial |
| `DependenciaRiograndeSeeder`: Comisaria Primera R.G | Comisaria Primera | Misma denominación base con sufijo territorial | Media | Sí |
| `DependenciaUshuaiaSeeder`: Comisaria de Familia y Genero 1 | `TotaldependenciaSeeder`: Comisaria de Genero y Familia 1 | Diferencia de orden de palabras | Media | Sí |
| `DestacamentoSeeder`: Dto 550 Ingreo Andorra | `TotaldependenciaSeeder`: Dto 550 Ingreso Andorra | Diferencia ortográfica evidente | Alta | Sí, validar nombre oficial |
| `RecursoHumanoSeeder`: Bienestar Policial | `TotaldependenciaSeeder`: Bienestar Policial D.G.R.H | Nombre base y unidad superior coincidente | Media | Sí |
| `InvestigacioneSeeder`: Policia Cientifica | `TotaldependenciaSeeder`: Policia Cientifica | Nombre idéntico | Alta | Sí, confirmar si es unidad o subárea |
| `ServiciosespecialeSeeder`: Seccion canes | `TotaldependenciaSeeder`: Seccion canes D.S.E.U | Nombre base y sigla de unidad | Media | Sí |
| `AdministracionSeeder`: Compras | `TotaldependenciaSeeder`: Compras D.G.A | Nombre base y unidad superior coincidente | Alta | Sí |
| `JefaturaSeeder`: Asesoria letrada | `TotaldependenciaSeeder`: Asesoria letrada | Nombre normalizado equivalente | Alta | Sí |
| `DependenciaTolhuinSeeder`: Dto. Control de Ruta 480 | `TotaldependenciaSeeder`: Dto. 365 Control de ruta | Ambos son destacamentos, pero números distintos | Baja | Sí, no fusionar sin evidencia |

# 5. Catálogo canónico propuesto

El siguiente catálogo es una hipótesis de agrupación, no una decisión de migración. `Padre propuesto` queda vacío cuando no existe evidencia suficiente.

| Nombre canónico | Tipo | Territorio | Padre propuesto | Registros legacy asociados | Confianza |
|---|---|---|---|---|---|
| Comisaría Primera | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_primeras`, `userComisaria1` | Alta |
| Comisaría Segunda | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_segundas`, `userComisaria2` | Alta |
| Comisaría Tercera | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_terceras`, `userComisaria3` | Alta |
| Comisaría Cuarta | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_cuartas`, `userComisaria4` | Alta |
| Comisaría Quinta | unidad_operativa | Ushuaia |  | DependenciaUshuaia, Totaldependencia, `comisaria_quintas`, `userComisaria5` | Alta |
| Administración | unidad_organizativa | no confirmado |  | `administracions`, `administraciongenerales`, `Totaldependencia` con sufijo D.G.A | Media |
| Jefatura | unidad_organizativa | no confirmado |  | `jefaturas`, `jefaturagenerales`, `Totaldependencia` | Media |
| Investigaciones | unidad_organizativa | no confirmado |  | `investigaciones`, `investigacionesgenerales`, `Totaldependencia` con sufijo D.G.I.C | Media |
| Recursos Humanos | unidad_organizativa | no confirmado |  | `recurso_humanos`, `recursoshumanosgenerales`, `Totaldependencia` con sufijo D.G.R.H | Media |
| Servicios Especiales | unidad_operativa | no confirmado |  | `serviciosespeciales`, `serviciosespecialesgenerales`, `Totaldependencia` D.S.E.U | Media |
| Custodia Gubernamental | unidad_operativa | no confirmado |  | `custodiagubernamentales`, `custodiagubernamentalgenerales`, `Totaldependencia` | Media |
| Policía Científica | unidad_organizativa | no confirmado |  | `cientificas`, `investigacionesgenerales`, `Totaldependencia` | Media |
| Bienestar Policial | subarea | no confirmado |  | `bienestares`, `recursoshumanosgenerales`, `Totaldependencia` D.G.R.H | Media |
| Sumario Policial | subarea | no confirmado |  | `sumarios`, `recursoshumanosgenerales`, `Totaldependencia` D.G.R.H | Media |
| Destacamento | unidad_operativa | no confirmado |  | `destacamentos`, `Totaldependencia`, dependencias territoriales | Baja |

# 6. Totaldependencia

`Totaldependencia` se define en [Totaldependencia.php](app/Models/Totaldependencia.php) y [2023_07_25_150655_create_totaldependencias_table.php](database/migrations/2023_07_25_150655_create_totaldependencias_table.php). Tiene solo `id`, `nombre` y timestamps. Su seeder contiene 66 inserciones.

Su uso persistido confirmado es:

- `trabajos_informaticos.totaldependencia_id` -> `totaldependencias.id`.
- `TrabajosInformatico::totaldependencia()`.
- Componentes de creación y consulta de trabajos informáticos.

El catálogo mezcla:

- Comisarías.
- Destacamentos.
- Subáreas de D.S.E.U, D.G.A, D.G.R.H y D.G.I.C.
- Jefatura, Administración e Investigaciones.
- Policía Científica y Custodia.
- Valores genéricos como `Otras` y `Sin datos`.

No hay evidencia suficiente para afirmar que todos sus registros sean dependencias formales. Se clasifica provisionalmente como `catalogo_legacy` y fuente de mapeo, no como fuente canónica confirmada.

# 7. Comisarías

Las tablas `comisaria_primeras` a `comisaria_quintas` no tienen FK genérica de dependencia. El destino se identifica por:

```text
nombre de tabla -> modelo -> ruta -> componente Livewire
```

Ejemplo documentado: `comisaria_primeras` -> `ComisariaPrimera` -> rutas de `comisaria1`.

Las tablas no tienen una relación directa con `User`, trabajos o una tabla de dependencia. Sus seeders individuales crean filas de oficinas y equipos; por lo tanto, el dato de dependencia no está en cada fila.

La equivalencia con `DependenciaUshuaiaSeeder` y `TotaldependenciaSeeder` es fuerte para las cinco comisarías por coincidencia de nombre y contexto, pero debe validarse funcionalmente antes de migrar.

# 8. Río Grande

Fuentes principales:

- `Riogrande` / `riograndes`: cabecera territorial.
- `DependenciaRiogrande` / `dependencia_riograndes`: catálogo de dependencias concretas.
- `Riograndegenerale` / `riograndegenerales`: inventario con `riogrande_id` y `dependencia_riogrande_id`.
- `Comunicacionesrg` / `comunicacionesrgs`: comunicación con `dependencia_riogrande_id`.

El significado aparente es:

```text
riogrande_id = cabecera o ámbito territorial
dependencia_riogrande_id = dependencia concreta
```

La relación `DependenciaRiogrande::trabajosgenerale()` usa `dependencia_rg_id`, mientras la migración y `TrabajosGenerale` usan `dependencia_riogrande_id`. Es una inconsistencia no resuelta.

# 9. Tolhuin

Fuentes principales:

- `Tolhuin` / `tolhuins`: cabecera territorial.
- `DependenciaTolhuin` / `dependencia_tolhuins`: catálogo de dependencias concretas.
- `Tolhuingenerale` / `tolhuingenerales`: inventario con `tolhuin_id` y `dependencia_tolhuin_id`.
- `Comunicacionestolhuin` / `comunicacionestolhuins`: comunicación con `dependencia_tolhuin_id`.

El patrón aparente es equivalente al de Río Grande. No se encontró la variante `dependencia_tl_id` ni una discrepancia nominal equivalente; sí debe confirmarse si `tolhuin_id` es territorio o unidad superior.

# 10. Usuarios y pertenencia

La tabla `users` no tiene FK de dependencia. La pertenencia se infiere por:

- Nombre de usuario.
- Email.
- Rol Spatie.
- IDs fijos en componentes.
- Ruta o módulo accedido.
- Relaciones de notificaciones con usuarios, que no equivalen a pertenencia.

Ejemplos:

- `userComisaria1` sugiere Comisaría Primera.
- `userComisaria2` a `userComisaria5` siguen el mismo patrón.
- `Adminrg` sugiere Río Grande, pero mezcla territorio y función administrativa.

No existe una relación formal `User -> Dependencia` ni `User -> UnidadOrganizativa`.

# 11. Casos ambiguos

- `Otras` y `Sin datos`: son valores de reserva, no dependencias reales confirmadas.
- `Totaldependencia`: mezcla niveles organizativos y destinos sin jerarquía.
- `Riogrande`/`Tolhuin` frente a sus catálogos `Dependencia*`: cabecera territorial o unidad superior no confirmado.
- Administración, Jefatura e Investigaciones: podrían ser dependencias o áreas internas.
- Bienestar y Sumarios: parecen subáreas de RRHH, pero la jerarquía no está persistida.
- Custodia: combina oficinas, pisos, organismos externos y ubicaciones.
- `OtrasInstitucione`: contiene organismos externos; no debe fusionarse automáticamente con dependencias policiales.
- `Comisaria de Familia y Genero 1` frente a `Comisaria de Genero y Familia 1`: posible equivalencia, no confirmada.
- `Comisaria Primera` frente a `Comisaria Primera R.G`: misma denominación base, territorios distintos.
- `Dto. Control de Ruta 480` frente a `Dto. 365 Control de ruta`: nombres parecidos, pero números diferentes.

# 12. Riesgos de migración

1. Fusionar nombres sin preservar fuente, tabla e ID original.
2. Confundir territorio con dependencia concreta.
3. Convertir `Totaldependencia` en fuente canónica sin validar sus 66 registros.
4. Migrar comisarías sin una relación explícita por fila.
5. Inferir la dependencia de comunicaciones únicamente por la ruta.
6. Tratar roles como pertenencia organizativa.
7. Perder la diferencia entre unidad, subárea y ubicación.
8. Interpretar `riogrande_id` y `dependencia_riogrande_id` como el mismo concepto.
9. Ignorar la discrepancia `dependencia_rg_id`.
10. Confundir instituciones externas con dependencias policiales.
11. Conservar nombres duplicados por diferencias ortográficas sin un estado de validación.
12. Asignar padres jerárquicos sin evidencia funcional.

# 13. Fuentes de verdad actuales

| Fuente | Evaluación |
|---|---|
| `DependenciaUshuaia`, `DependenciaRiogrande`, `DependenciaTolhuin` | Fuentes territoriales activas para varios inventarios, trabajos y comunicaciones |
| Catálogos `Administracion`, `Jefatura`, `Investigacione`, etc. | Fuentes de unidades funcionales específicas |
| `Totaldependencia` | Catálogo consolidado/paralelo usado por trabajos informáticos |
| Tablas `comisaria_*` | Fuente estructural de inventario, con dependencia implícita |
| Tablas de comunicaciones específicas | Fuente estructural y/o territorial según la variante |
| Usuarios y roles | Referencias indirectas, no fuente formal de dependencia |
| Rutas y componentes Livewire | Contexto operativo; no fuente persistente |

No existe una única fuente de verdad actual.

# 14. Recomendaciones para el siguiente relevamiento

1. Obtener una exportación real de cada catálogo cuando exista una base disponible, sin modificarla.
2. Construir una matriz `fuente + tabla + id + nombre + territorio + contexto`.
3. Validar manualmente las equivalencias de nombres.
4. Confirmar la jerarquía oficial entre territorio, dependencia, unidad y subárea.
5. Identificar el significado funcional de `riogrande_id` y `tolhuin_id`.
6. Revisar todos los componentes que asignan IDs literales de dependencia.
7. Documentar el mapeo de cada tabla de comunicaciones implícita.
8. Determinar si los usuarios tienen una dependencia principal o varias.
9. Definir si las instituciones externas se modelarán fuera del catálogo policial.
10. Mantener este catálogo como documento de análisis y no como migración automática.

## Resumen

- Registros de inserción estática en las fuentes principales: **404**.
- Fuentes con mayor volumen: `TotaldependenciaSeeder` (66), tres catálogos territoriales (48 en conjunto) y cinco seeders de comisarías (32 cada uno).
- Posibles equivalencias documentadas: **11**.
- Casos ambiguos explícitos: **11**.
- Clasificación aproximada del catálogo por fuente: territorio/dependencia territorial, unidad organizativa, subárea, unidad operativa, institución externa y catálogo legacy.
- Principales duplicaciones:
  - Comisarías entre catálogos, tablas, rutas y roles.
  - Administración, Jefatura, RRHH e Investigaciones entre catálogos específicos y `Totaldependencia`.
  - Destacamentos entre `Destacamento`, `Totaldependencia` y dependencias territoriales.
  - Policía Científica, Bienestar y Sumarios entre unidades específicas y catálogos consolidados.

Este documento no decide fusiones definitivas. Cada equivalencia debe conservar la evidencia exacta y validarse antes de diseñar el modelo lógico.