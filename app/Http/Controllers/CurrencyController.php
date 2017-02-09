<?php namespace App\Http\Controllers;

use App\Services\Results;
use App\Services\Wsdl\Currency;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use ReflectionClass;

/**
 * Class CurrencyController
 * @package App\Http\Controllers
 */
class CurrencyController extends Controller
{
    const FROM = 'from';

    const TO = 'to';

    /**
     * @var Results
     */
    private $results;


    public function __construct()
    {
        $this->results = new Results();
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $reflection = new ReflectionClass('App\Services\Wsdl\Currency');
        $data = [];
        foreach ($reflection->getConstants() as $constant) {
            array_push($data, $constant);
        }
        return view('currencydash', $data)->with('data', $data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function indexResult(Request $request)
    {
        $from = null;
        $to = null;
        parse_str($request->getQueryString());
        try {
            $result['value'] = $this->results->getResult($from, $to);
            return view('currencyresult', $result)->with('result', $result);
        } catch (\Exception $exception) {
            return new Response('Opps something went wrong, try again');
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @throws \Exception
     * @return Response
     */
    public function apiResult(Request $request, Response $response)
    {
        if ($request->getMethod() != 'POST') {
            $body[self::TO] = Currency::INR;
            $body[self::FROM] = Currency::USD;
            return new Response('Please try Post Request. <br>'.
            ' Sample body: <br>' .
                json_encode($body));
        }
        $responseBody = [];
        try {
            $body = json_decode($request->getContent(), true);
            if (!$body) {
                throw new \Exception('Malformed JSON');
            } else {
                if (!(array_key_exists($body[self::FROM], $body) or !array_key_exists($body[self::TO], $body))) {
                    throw new \Exception('Array Key Missing');
                } else {
                    $content = $this->results->getResult($body[self::FROM], $body[self::TO]);
                    $responseBody['result'] = $content;
                    $responseBody['status'] = Response::HTTP_ACCEPTED;
                    $responseBody['reason'] = null;
                }
            }
        } catch (\Exception $exception) {
            $responseBody['result'] = null;
            $responseBody['status'] = Response::HTTP_BAD_REQUEST;
            $responseBody['reason'] = $exception->getMessage();
        }
        $response->header('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_ACCEPTED);
        $response->setContent(json_encode($responseBody));
        return $response;
    }
}
