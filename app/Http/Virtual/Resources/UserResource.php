<?php

namespace App\Http\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="UserResource",
 *     description="UserResource",
 *     @OA\Xml(
 *         name="UserResource"
 *     )
 * )
 */
class UserResource
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="id"
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @OA\Property(
     *     title="name",
     *     description="name"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="email",
     *     description="email"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="user_type_id",
     *     description="user_type_id"
     * )
     *
     * @var integer
     */
    public $user_type_id;

    /**
     * @OA\Property(
     *     title="position_id",
     *     description="position_id"
     * )
     *
     * @var integer
     */
    public $position_id;

    /**
     * @OA\Property(
     *     title="subdivision_id",
     *     description="subdivision_id"
     * )
     *
     * @var integer
     */
    public $subdivision_id;
}
