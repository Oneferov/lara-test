<?php

namespace App\Http\Virtual\Interfaces;

interface UserControllerInterface
{

    /**
     * @OA\GET(
     *     path="/api/users/search",
     *     tags={"Users"},
     *     summary="Get users by name, email",
     *     description="User profile data",
     *     @OA\Parameter(
     *         description="first name of user",
     *         in="query",
     *         name="first_name",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="last name of user",
     *         in="query",
     *         name="last_name",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="email of user",
     *         in="query",
     *         name="email",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *           @OA\Property(
     *               property="data",
     *               type="array",
     *               description="array of query items",
     *               @OA\Items(ref="#/components/schemas/UserResource") 
     *           ),
     *         ),
     *       )
     *     )
     * )
     */
    public function search();

}
