<?php _¬WError('Libreria aun no codificada: CORE.GZIP.php');
/*
        Dim FiGZ As String = HTTP.Directorio(Coax(POP(3))), ACN As String = Coax(POP(4))
        Dim GZ As New IO.Compression.GZipStream(New IO.FileStream(FiGZ, FileMode.OpenOrCreate, FileAccess.Write, FileShare.Read Or FileShare.Delete), Compression.CompressionMode.Compress)
        If GZ.BaseStream.Length = 0 OrElse Trim(Coax(POP(5))).ToUpper = "TRUE" Then
            GZ.BaseStream.SetLength(0)
            Try : Dim BF() As Byte = FUNCIONES.BytesFormString(CNT + ACN)
                GZ.Write(BF, 0, BF.Length)
                GZ.Flush()
            Catch ex As Exception
            End Try
        Else : WriteError("El Archivo '" + FiGZ + "', ya existe !!")
        End If
        GZ.BaseStream.Close()
        Try : GZ.Close()
        Catch ex As Exception
        End Try
*/
?>