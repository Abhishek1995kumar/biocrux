<?php

namespace App\Exceptions;

use Throwable;
use ReflectionException;   
use BadMethodCallException;
use InvalidArgumentException;
use Illuminate\View\ViewException;
use Illuminate\Database\QueryException;
use App\Exceptions\RequestTimeoutException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    public function report(Throwable $e) {
        $this->loadError($e);
        parent::report($e);
    }


    public function loadError(Throwable $e) {
        try {
            $line = $e->getLine();
            $file = $e->getFile();
            $message = $e->getMessage();
            $code = $e->getCode();

            if($e instanceof QueryException) {
                errorLog(
                    $file, $line, $message,
                    $e->getSql(), $e->getBindings(),
                    $code
                );
            }
            errorLog($file, $line, $message, $code, '', '');

        } catch (ReflectionException | BadMethodCallException | InvalidArgumentException | ViewException $e) {
            errorLog("Error while logging exception: " . $e->getMessage());
        }

    }


    public function render($request, Throwable $exception) {
        if ($exception instanceof BadRequestHttpException) {
            return response()->view('admin.errors.400', [], 400); 
        }
    
        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException || $exception instanceof InvalidArgumentException) {
            return response()->view('admin.errors.404', [], 404); 
        }
    
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('admin.errors.404', [], 404); 
        }
    
        if ($exception instanceof AuthenticationException) {
            return response()->view('admin.errors.401', [], 401); 
        }
    
        if ($exception instanceof AuthorizationException) {
            return response()->view('admin.errors.403', [], 403); 
        }
    
        if ($exception instanceof MethodNotAllowedHttpException || $exception instanceof BadMethodCallException) {
            return response()->view('admin.errors.405', [], 405); 
        }

        if ($exception instanceof RequestTimeoutException) {
            return response()->view('admin.errors.408', [], 408); 
        }
    
        if ($exception instanceof TokenMismatchException) {
            return response()->view('admin.errors.419', [], 419); 
        }
    
        if ($exception instanceof ValidationException) {
            return response()->view('admin.errors.422', [], 422); 
        }
    
        if ($exception instanceof TooManyRequestsHttpException) {
            return response()->view('admin.errors.429', [], 429); 
        }
    
        if ($exception instanceof ReflectionException) {
            return response()->view('admin.errors.500', [], 500);  // ✅ Class Not Found error ko 500 me map kiya
        }
    
        if ($exception instanceof \ErrorException) {
            return response()->view('admin.errors.440', [], 440); 
        }
    
        if ($exception instanceof ServiceUnavailableHttpException) {
            return response()->view('admin.errors.503', [], 503); 
        }
    
        if ($exception instanceof \ErrorException) {
            return response()->view('admin.errors.500', [], 500);
        }
    
        if ($exception instanceof \Illuminate\Database\QueryException) {
            return response()->view('admin.errors.500', [], 500);
        }
    
        if ($exception instanceof \PDOException) {
            return response()->view('admin.errors.503', 500);
        }
        
        return response($exception->getMessage());
    }


    public function renderForConsole($output, Throwable $exception) {
        return parent::renderForConsole($output, $exception);
    }

    public function shouldReport(Throwable $e) {
        // Customize the logic to determine if the exception should be reported
        return true; // Report all exceptions by default
    }

    public function shouldRender($request, Throwable $exception) {
        // Customize the logic to determine if the exception should be rendered
        return true; // Render all exceptions by default
    }


    public function shouldReportToSentry(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Sentry
        return true; // Report all exceptions to Sentry by default
    }


    public function shouldReportToBugsnag(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Bugsnag
        return true; // Report all exceptions to Bugsnag by default
    }


    public function shouldReportToRollbar(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Rollbar
        return true; // Report all exceptions to Rollbar by default
    }


    public function shouldReportToRay(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Ray
        return true; // Report all exceptions to Ray by default
    }


    public function shouldReportToLog(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Log
        return true; // Report all exceptions to Log by default
    }


    public function shouldReportToEmail(Throwable $e) {
        // Customize the logic to determine if the exception should be reported via email
        return true; // Report all exceptions via email by default
    }


    public function shouldReportToSlack(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Slack
        return true; // Report all exceptions to Slack by default
    }


    public function shouldReportToTelegram(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Telegram
        return true; // Report all exceptions to Telegram by default
    }


    public function shouldReportToDiscord(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to Discord
        return true; // Report all exceptions to Discord by default
    }


    public function shouldReportToCustomService(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to a custom service
        return true; // Report all exceptions to custom service by default
    }


    public function shouldReportToCustomLogger(Throwable $e) {
        // Customize the logic to determine if the exception should be reported to a custom logger
        return true; // Report all exceptions to custom logger by default
    }


}
