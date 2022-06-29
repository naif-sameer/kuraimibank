export enum HttpCodeEnum {
  Ok = 200,

  Created = 201,

  Accepted = 202,

  NotModified = 304,

  UseProxy = 305,

  SwitchProxy = 306,

  TemporaryRedirect = 307,

  PermanentRedirect = 308,

  /**
   * Similar to 403 Forbidden, but specifically for use when authentication is required and has failed or has not yet
   * been provided. The response must include a WWW-Authenticate header field containing a challenge applicable to the
   * requested resource. See Basic access authentication and Digest access authentication. 401 semantically means
   * "unauthenticated",i.e. the user does not have the necessary credentials.
   */
  Unauthorized = 401,

  Forbidden = 403,

  NotFound = 404,

  MethodNotAllowed = 405,

  NotAcceptable = 406,

  ValidationError = 422,

  InternalServerError = 500,

  NotImplemented = 501,

  BadGateway = 502,

  ServiceUnavailable = 503,

  GatewayTimeout = 504,
}
