<?php _¬WError('Libreria aun no codificada: CORE.WKHTMLTOPDF.php');
/*
        Dim FiMod As String = Coax(POP(3)), vrs As String = Trim(Coax(POP(4))).ToUpper, FiPdf As String = Coax(POP(5)), MdTmp As Boolean = FiPdf = "", ACN As String = Coax(POP(6)), Err As String = ""
        If MdTmp Then FiPdf = INFORMACION.CreateTemp(".pdf") Else FiPdf = HTTP.Directorio(FiPdf)
        If FiMod.IndexOf(".exe", StringComparison.OrdinalIgnoreCase) < 0 Then FiMod += ".exe"
        FiMod = HTTP.Directorio(FiMod)
        If vrs = "2018-06-11" AndAlso IO.File.Exists(FiMod) AndAlso New FileInfo(FiMod).Length = 44802048 Then
            CNT += ACN
            ' Creo temporal HTML = ACN
            ACN = HTTP.Directorio("__xTMP!RW" + Now.Ticks.ToString + ".html")
            IO.File.WriteAllText(ACN, CNT, System.Text.Encoding.Default)
            ' Valido PDF
            If (MdTmp OrElse Trim(Coax(POP(7))).ToUpper = "TRUE") OrElse Not IO.File.Exists(FiPdf) OrElse New FileInfo(FiPdf).Length = 0 Then
                File.Delete(FiPdf)
                If Not rt.API.RunShell(FiMod, "-q """ + ACN + """ """ + FiPdf + """", Err, True, 1) Then
                    WriteError("RUN-EXTENDS(" + CD + " / " + vrs + ")-ERROR: " + Err)
                ElseIf MdTmp Then : Threading.Thread.Sleep(100)
                    Dim BF() As Byte = IO.File.ReadAllBytes(FiPdf)
                    rHTM.Write(BF, 0, BF.Length)
                    If File.Exists(FiPdf) Then File.Delete(FiPdf)
                End If
            Else : WriteError("El Archivo '" + FiPdf + "', ya existe !!")
            End If
            'Elimino Temporal HTML
            If IO.File.Exists(ACN) Then IO.File.Delete(ACN)
        Else : WriteError(CD + ": No se puede Cargar la versión: " + vrs)
        End If
*/
?>