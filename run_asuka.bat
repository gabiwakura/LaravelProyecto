@echo off
setlocal
cd /d "%~dp0"

echo ======================================================
echo    LANZANDO PAGINA DE ASUKA LANGLEY (EVANGELION)
echo ======================================================

:: Verificar si existe el archivo .env
if not exist .env (
    echo [ERROR] No se encontro el archivo .env. Por favor, configuralo.
    pause
    exit /b
)

:: Iniciar el servidor de Laravel en segundo plano
echo [1/3] Iniciando servidor de Laravel (php artisan serve)...
start /b "Laravel" php artisan serve --port=8000

:: Iniciar Vite para los assets
echo [2/3] Iniciando servidor de Vite (npm run dev)...
start /b "Vite" npm run dev

:: Esperar unos segundos para que los procesos inicien
echo [3/3] Abriendo navegador en http://localhost:8000/asuka...
timeout /t 5 /nobreak > nul

:: Abrir la URL directamente en el navegador predeterminado
start http://localhost:8000/asuka

echo.
echo ======================================================
echo    PAGINA ABIERTA CORRECTAMENTE
echo    Presiona cualquier tecla para cerrar los servidores
echo ======================================================
pause

:: Matar los procesos al cerrar (opcional, pero limpio)
taskkill /FI "WINDOWTITLE eq Laravel" /F > nul 2>&1
taskkill /FI "WINDOWTITLE eq Vite" /F > nul 2>&1

exit /b
