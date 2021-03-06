USE [PRUEBA]
GO
/****** Object:  Table [dbo].[Personas]    Script Date: 09/06/2022 4:39:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Personas](
	[identificador] [int] IDENTITY(1,1) NOT NULL,
	[Nombres] [varchar](50) NULL,
	[Apellidos] [varchar](50) NULL,
	[Numeroident] [numeric](18, 0) NOT NULL,
	[email] [varchar](100) NULL,
	[tipoidentificacion] [varchar](3) NULL,
	[Fechacreacion] [date] NULL,
	[Id_tipoid]  AS (concat([tipoidentificacion],'-',[Numeroident])),
	[Nombrecompleto]  AS (concat([Nombres],' ',[Apellidos])),
 CONSTRAINT [PK_Personas] PRIMARY KEY CLUSTERED 
(
	[Numeroident] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Usuarios]    Script Date: 09/06/2022 4:39:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Usuarios](
	[Identificador] [numeric](18, 0) NOT NULL,
	[Usuario] [varchar](100) NULL,
	[Pass] [varchar](100) NULL,
	[Fecha_creacion] [date] NULL,
 CONSTRAINT [PK_Usuarios] PRIMARY KEY CLUSTERED 
(
	[Identificador] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  StoredProcedure [dbo].[RegistraPersonas]    Script Date: 09/06/2022 4:39:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Manuel Pacheco>
-- Create date: <Create Date,,09/06/2022>
-- Description:	<Description,,Mustra todos los registros de la tabla persona>
-- =============================================
CREATE PROCEDURE [dbo].[RegistraPersonas]
@NOMBRE VARCHAR(50),
@APELLIDO VARCHAR(50),
@NUMEROIDENT NUMERIC(20,0),
@EMAIL VARCHAR(50),
@TIPOID VARCHAR(3),
@FECHAREG DATE,
@USER VARCHAR(100),
@PASSWD VARCHAR(100)
AS
BEGIN
	INSERT INTO Personas(Nombres,Apellidos,Numeroident,email,tipoidentificacion,Fechacreacion) 
	VALUES (@NOMBRE,@APELLIDO,@NUMEROIDENT,@EMAIL,@TIPOID,@FECHAREG);

	INSERT INTO Usuarios(Identificador,Usuario,Pass,Fecha_creacion) 
	VALUES (@NUMEROIDENT,@USER,@PASSWD,@FECHAREG);
END
GO
/****** Object:  StoredProcedure [dbo].[VERPERSONAS]    Script Date: 09/06/2022 4:39:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[VERPERSONAS]
AS
BEGIN
	SELECT * FROM Personas
	ORDER BY identificador
END
GO
